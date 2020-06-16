<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $primaryKey = "vendor_id";
    protected $fillable = ['name'];

    public function assets()
    {
        return $this->hasMany("App\models\Asset", "vendor_id", "vendor_id");
    }
}
