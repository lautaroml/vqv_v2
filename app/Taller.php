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
        return $this->belongsToMany('App\User')->withTimestamps();;
    }

    public function isFull()
    {
        $inscriptos = count($this->users);

        if ($inscriptos == $this->cupo) {
            return true;
        }
        return false;
    }
    
    public function inscriptos()
    {
        return count($this->users());
    }
}
