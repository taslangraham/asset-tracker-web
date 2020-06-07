<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = "category_id";

    public function assets()
    {
        return $this->hasMany("App\models\Asset", "category_id", "category_id");
    }
}
