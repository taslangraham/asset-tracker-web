<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $primaryKey = "status_id";

    public function beacons()
    {
        return $this->hasMany("App\models\Beacon", "status_id", "status_id");
    }

    public function assets()
    {
        return $this->hasMany("App\models\Asset", "status_id", "status_id");
    }
}
