<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $primaryKey = "asset_id";

    public function manufacturer()
    {
        return $this->belongsTo("App\models\Manufacturer", "manufacturer_id", "manufacturer_id");
    }
}
