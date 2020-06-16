<?php

namespace App\Http\Controllers;

use App\models\Beacon;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\models\Manufacturer;
use App\models\Location;
use App\models\Status;

class BeaconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.beacon.index', with([
            'beacons' => Beacon::with('manufacturer')->get()
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $manufacturers = Manufacturer::all();
        $locations = Location::all();
        $statuses = Status::all();
        if ($manufacturers->isEmpty() || $locations->isEmpty() || $statuses->isEmpty()) {
            Session()->flash('error', "Please ensure you have a Manufaturer, Location, and Status before addin a beacon");
            return redirect()->route('beacons.index');
        }

        return view('admin.beacon.create', with([
            'locations' => $locations,
            'manufacturers' => $manufacturers,
            'statuses' => $statuses
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:beacons,name',
            'beacon_uuid' => 'required|unique:beacons,beacon_uuid',
            'location' => 'required',
            'status' => 'required',
            'manufacturer' => 'required'
        ]);

        Beacon::create([
            'beacon_uuid' => $request->beacon_uuid,
            'name' => $request->name,
            'location_id' => $request->location,
            'status_id' => $request->status,
            'manufacturer_id' => $request->manufacturer
        ]);

        Session()->flash('success', 'Beacon Added Successfully');
        return redirect()->route('beacons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        try {
            foreach ($request->beacons as $beacon) {
                $beaconToUpdate = Beacon::find($beacon['beacon_uuid']);
                if ($beaconToUpdate) {
                    $beaconToUpdate->location_id = $beacon['location_id'];
                    $beaconToUpdate->save();
                }
            }

            return response()->json(["msg" => "Locations succesfully updated"]);
        } catch (Exception $e) {
            dd($e);
            return response()->json(["msg" => "Something went wrong"], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beacon = Beacon::find($id);
        $beacon->delete();
        Session()->flash('success', "Beacon Succesfully Deleted");
        return redirect()->route('beacons.index');
    }
}
