<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $primaryKey = "condition_id";

    public function assets()
    {
        return $this->hasMany("App\models\Asset", "condition_id", "condition_id");
    }
}
