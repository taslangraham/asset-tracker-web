<?php

use App\models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ["Inactive", "Missing", "Active", "Limited Use"];

        foreach ($statuses as $status) {
            $stat = new Status();
            $stat->name = $status;
            $stat->save();
        }
    }
}
