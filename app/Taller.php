<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    public function inscription()
    {
        return $this->belongsTo('App\Inscription', 'inscription_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
