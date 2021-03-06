<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    public function tallers()
    {
        return $this->hasMany('App\Taller', 'inscription_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'taller_user')->withTimestamps();;
    }
}
