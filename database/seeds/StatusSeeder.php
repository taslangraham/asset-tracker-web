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
        $statuses = ["At Assigned Location", "Missing", "Not At Assigned Location"];

        foreach ($statuses as $status) {
            $stat = new Status();
            $stat->name = $status;
            $stat->save();
        }
    }
}
