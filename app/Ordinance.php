<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Ordinance extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'title',
        'series',
        'keywords',
        'is_accepting',
        'pdf_file_path',
        'is_monitoring',
        'facebook_post_id',
    ];

    /**
     * Returns all suggestion for a given ordinance
     */
    public function suggestions()
    {
        return $this->belongsToMany('App\Suggestion');
    }

    public function statusReport()
    {
        return $this->hasOne('App\StatusReport');
    }

    public function updateReport()
    {
        return $this->hasMany('App\UpdateReport');
    }

    public function getQuestionnaire()
    {
        return Questionnaire::where('ordinance_id', $this->id)->first();

    }

    public function isAccepting()
    {
        if(!$this->getQuestionnaire()){
            return false;
        } else {

        }
        return $this->getQuestionnaire()->isAccepting || $this->is_accepting;

    }

    public function  acceptingComments()
    {
        return $this->is_accepting;
    }
}
