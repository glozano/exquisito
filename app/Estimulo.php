<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimulo extends Model
{
    public function hueso()
    {
        return $this->belongsTo('App\Hueso');
    }
}
