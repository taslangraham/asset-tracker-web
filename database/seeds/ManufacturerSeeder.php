<?php

use App\models\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacturers = [
            "Kardex Group",
            "Bostitch",
            "Western Tablet and Stationery Company",
            "Quill Corporation",
            "OfficeMax",
            "Avery Dennison",
            "Pitney Bowes",
        ];

        foreach ($manufacturers as $manufacturer) {
            $man = new Manufacturer();
            $man->name = $manufacturer;
            $man->save();
        }
    }
}
