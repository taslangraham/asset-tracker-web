<?php

use App\models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendors = ["Massy Technologies", "American Equipment LTD", "Stuarts Hardware", "Microsoft"];

        foreach ($vendors as $vendor) {
            $newVendor = new Vendor();
            $newVendor->name = $vendor;
            $newVendor->save();
        }
    }
}
