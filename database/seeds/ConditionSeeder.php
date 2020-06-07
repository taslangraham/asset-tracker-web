<?php

use App\models\Condition;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conditions = array(
            "Good" => ["Good", "This asset is in good conditions"],
            "Needs Repair" => ["Needs Repair", "This asset needs repair"],
            "Out of Service" => ["Out of Service", "Currently out of service"],
        );

        foreach ($conditions as $con) {
            $condition = new Condition();
            $condition->name = $con[0];
            $condition->description = $con[1];
            $condition->save();
        }

    }
}
