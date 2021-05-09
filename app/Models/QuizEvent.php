<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizEvent extends Model
{
    use HasFactory;

    protected $table = "quiz_events";
    protected $primaryKey = "quiz_event_id";

    protected $fillable = [
        'quiz_event_name',
        'quiz_event_status',
        'questionnaire_id',
        'class_id',
    ];

    public function classe(){
        return $this->hasOne('App\Models\Classe', 'class_id', 'class_id');
    }

    public function subject(){
        return $this->hasOne('App\Models\Subject', 'subject_id', 'subject_id');
    }

    public function user(){
        return $this->hasOne('App\Models\User', 'usr_id', 'instructor_id');
    }

    public function questionnaire(){
        return $this->hasOne('App\Models\Questionnaire', 'questionnaire_id', 'questionnaire_id');
    }
    public function student_class(){
        return $this->hasOne('App\Models\StudentClasse', 'class_id', 'class_id');
    }
}
