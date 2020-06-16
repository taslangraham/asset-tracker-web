<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $primaryKey = "location_id";
    protected $fillable = ['name'];
    public function beacons()
    {
        return $this->hasMany('App\models\Beacon', 'location_id', 'location_id');
    }

    public function assetsAssigned()
    {
        return $this->hasMany('App\models\Asset', 'assigned_location', 'location_id');
    }

    public function assetsLocated()
    {
        return $this->hasMany('App\models\Asset', 'current_location', 'location_id');
    }
}
