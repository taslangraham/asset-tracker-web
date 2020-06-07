<?php

use App\models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            "SCIT - Lab A",
            "SCIT - Lab B",
            "SCIT - Lab C",
            "SOBA - Room 22",
            "FOSS",
            "FELS",
            "SHTM",
            "FENC",
        ];

        foreach ($locations as $loc) {
            $location = new Location();
            $location->name = $loc;
            $location->save();
        }
    }
}
