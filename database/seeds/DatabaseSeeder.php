<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ConditionSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(ManufacturerSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(VendorSeeder::class);

        // important - Beacon and Asset must come last
        $this->call(BeaconSeeder::class);
    }
}
