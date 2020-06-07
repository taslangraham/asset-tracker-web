<?php

use App\models\Beacon;
use App\models\Location;
use App\models\Manufacturer;
use App\models\Status;
use Illuminate\Database\Seeder;

class BeaconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $table->foreignId('location_id')->unsigned();
        // $table->foreignId('manufacturer_id')->unsigned();
        // $table->foreignId('status_id')->unsigned();
        $f = [];
        $manufacturers = Manufacturer::all()->pluck('manufacturer_id')->toArray();
        $status = Status::all()->pluck('status_id')->toArray();
        $locations = Location::all()->pluck('location_id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            $beacon = new Beacon();
            $beacon->beacon_uuid = uniqid();
            $beacon->name = 'Beacon ' . $i;

            $beacon->location_id = array_rand($locations, 1) + 1;

            $beacon->manufacturer_id = array_rand($manufacturers, 1) + 1;

            $beacon->status_id = array_rand($status, 1) + 1;
            $beacon->save();

        }
        // dd($f);

    }
}
