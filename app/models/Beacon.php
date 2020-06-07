<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Beacon extends Model
{
    public $incrementing = false;
    protected $primaryKey = "beacon_uuid";


    public function location()
    {
        return $this->belongsTo("App\models\Location", 'location_id', 'location_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo("App\models\Manufacturer", "manufacturer_id", "manufacturer_id");
    }

    public function status()
    {
        return $this->belongsTo("App\models\Status", "status_id", "status_id");
    }

    public function asset()
    {
        return $this->hasOne("App\models\Asset", "beacon_uuid", "beacon_uuid");
    }
}
