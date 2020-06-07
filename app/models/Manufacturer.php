<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{

    protected $primaryKey = "manufacturer_id";

    public function beacon()
    {
        return $this->hasMany("App\models\Beacon");
    }

    public function assets()
    {
        return $this->hasMany("App\models\Asset", "manufacturer_id", "manufacturer_id");
    }
}
