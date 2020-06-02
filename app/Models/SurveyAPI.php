<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyAPI extends Model
{
    protected $table = "survey_api";
    protected $fillable = ['title', 'description', 'user_id'];

    public function question()
    {
        return $this->hasMany('App\Models\Question', 'survey_id');
    }
}
