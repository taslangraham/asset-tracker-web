<?php

namespace App\Http\Controllers;

use App\models\Asset;
use App\models\Beacon;
use Illuminate\Http\Request;
use App\models\Status;
use App\models\Location;
use App\models\Manufacturer;
use App\models\Vendor;
use App\models\Category;
use App\models\Size;
use App\models\Condition;
use Exception;
use Illuminate\Contracts\Session\Session;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.asset.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $just = Manufacturer::all();

        return view("admin.asset.create", with([
            'statuses' => Status::all(),
            'locations' => Location::all(),
            'manufacturers' => Manufacturer::all(),
            'statuses' => Status::all(),
            'vendors' => Vendor::all(),
            'categories' => Category::all(),
            'sizes' => Size::all(),
            'conditions' => Condition::all()

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
        $today = date("Y/m/d");
        // dd($request->all());
        $request->validate(
            [
                "name" => "required|unique:assets,name|max:256|min:5",
                "description" => "required|max:500",
                "value" => "required|integer|min:1",
                "date_purchased" => "required|max:$today",
                "manufacturer_id" => "required",
                "vendor_id" => "required",
                "size_id" => "required",
                "category_id" => "required",
                "condition_id" => "required",
                "location_id" => "required",
                "beacon_uuid" => "required|unique:beacons,beacon_uuid",
                "beacon_name" => "required|unique:beacons,name",
                "beacon_manufacturer_id" => "required",
                "beacon_status_id" => "required",
            ],
            [
                'beacon_uuid.unique' => 'This Beacon is already assigned to an asset'
            ]
        );

        DB::beginTransaction();
        try {
            Beacon::create([
                "beacon_uuid" => $request->beacon_uuid,
                "name" => $request->beacon_name,
                "location_id" => $request->location_id,
                "manufacturer_id" => $request->beacon_manufacturer_id,
                "status_id" => $request->beacon_status_id
            ]);

            Asset::create([
                "manufacturer_id" => $request->manufacturer_id,
                "vendor_id" => $request->vendor_id,
                "category_id" => $request->category_id,
                "status_id" => $request->status_id,
                "size_id" => $request->size_id,
                "condition_id" => $request->condition_id,
                "assigned_location" => $request->location_id,
                "beacon_uuid" => $request->beacon_uuid,
                "name" => $request->name,
                "description" => $request->description,
                "value" => $request->value,
                "date_purchased" => $request->date_purchased,
                "date_last_checked" => $today
            ]);

            DB::commit();
            $request->session()->flash('success', "Asset and beacon succesfully added.");
            return redirect()->route("assets.index");
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            $request->session()->flash('error', "Something went wrong. Please try again.");
            return redirect()->back();
        }
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
