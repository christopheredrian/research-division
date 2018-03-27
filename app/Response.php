<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    //
    public function questionnaire()
    {
        return $this->belongsTo('App\Questionnaire');
    }
}
