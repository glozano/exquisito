<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cadaveres(){
        return $this->hasMany('App\Cadaver');
    }

    public function personajes()
    {
        return $this->belongsToMany('App\Cadaver','personajes');
    }

    public function participa($cadaver){
        $this->cadaver = $cadaver;
        return !$this->whereHas('personajes',function ($query) {
                $query->where('cadaver_id', $this->cadaver->id);
            })->get()->isEmpty();
    }
}
