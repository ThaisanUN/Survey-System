<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    protected $fillable = [
        'user_id',
        'question', 
        'type',
        'survey_id'
    ];
    
    public function answer()
    {
        return $this->hasMany('App\Models\Answer', 'question_id');
    }
}
