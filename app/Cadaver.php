<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadaver extends Model
{
    protected $table = 'cadaveres';

    public function huesos()
    {
        return $this->hasMany('App\Hueso');
    }
}
