<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hueso extends Model
{
    public function estimulo()
    {
        return $this->hasOne('App\Estimulo');
    }
}
