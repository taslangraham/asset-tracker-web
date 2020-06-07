<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $primaryKey = 'size_id';

    public function assets()
    {
        return $this->hasMany("App\models\Asset", "size_id", "size_id");
    }
}
