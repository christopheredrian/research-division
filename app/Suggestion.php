<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    public function ordinances()
    {
        return $this->belongsToMany('App\Ordinance');
    }

    public function resolutions()
    {
        return $this->belongsToMany('App\Resolution');
    }
}
