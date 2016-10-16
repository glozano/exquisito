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

    public function personajes(){
        return $this->belongsToMany('App\User','personajes');
    }

    public function user(){
        return $this->hasOne('App\User');
    }

    public function save(array $options = [])
    {
        if(!empty($this->personajes)
        && !empty($this->llave)
        && !empty($this->titulo)){
            unset($this->attributes['personajes']);
            parent::save();
            return true;
        }else{
            return false;
        }
    }
}

