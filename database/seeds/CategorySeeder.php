<?php

use App\models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Office", "Classroom", "General", "Furniture"];
        foreach ($categories as $category) {
            $newCat = new Category();
            $newCat->name = $category;
            $newCat->save();
        }

    }
}
