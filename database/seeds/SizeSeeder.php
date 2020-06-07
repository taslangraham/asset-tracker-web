<?php

use App\models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = ["Small", "Medium", "Large"];

        foreach ($sizes as $size) {
            $newSize = new Size();
            $newSize->name = $size;
            $newSize->description = $size . " sized asset";
            $newSize->save();
        }
    }
}
