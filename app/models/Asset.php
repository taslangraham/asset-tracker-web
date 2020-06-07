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

    public function beacon()
    {
        return $this->belongsTo("App\models\Beacon", "beacon_uuid", "beacon_uuid");
    }

    public function category()
    {
        return $this->belongsTo("App\models\Category", "category_id", "category_id");
    }

    public function condition()
    {
        return $this->belongsTo("App\models\Condition", "condition_id", "condition_id");
    }

    public function location()
    {
        return $this->belongsTo("App\models\Location", "location_id", "location_id");
    }

    public function size()
    {
        return $this->belongsTo("App\models\Size", "size_id", "size_id");
    }

    public function status()
    {
        return $this->belongsTo("App\models\Status", "status_id", "status_id");
    }

    public function vendor()
    {
        return $this->belongsTo("App\models\Vendor", "vendor_id", "vendor_id");
    }
}
