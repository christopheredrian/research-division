<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ordinance extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
        'is_monitored',
        'facebook_post_id',
        'pdf_link',
        'status_report_date',
        'summary',
        'status',
        'legislative_action',
        'updates',
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
    public function questionnaire()
    {
        return $this->hasOne('App\Questionnaire');
    }

    /**
     * Gets the associated questionnaire for the current model
     * @return mixed
     */
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

    public function acceptingComments()
    {
        return $this->is_accepting;
    }
}
