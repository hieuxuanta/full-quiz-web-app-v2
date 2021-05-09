<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = "questions";
    protected $primaryKey = "question_id";

    protected $fillable = [
        'question_name',
        'question_type',
        'choices',
        'answer',
        'points',
        'questionnaire_id'
    ];

    public function answer(){
        $this->hasOne('App\Models\QuizStudentAnswer', 'question_id', 'question_id');
    }

    public function questionnaire(){
        $this->belongsTo('App\Models\Questionnaire', 'questionnaire_id', 'questionnaire_id');
    }
}
