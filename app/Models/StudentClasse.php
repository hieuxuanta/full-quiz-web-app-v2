<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClasse extends Model
{
    use HasFactory;

    protected $table = "student_classes";
    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'class_id',
        'student_id'
    ];

    public function classe(){
        return $this->belongsTo('App\Models\Classe', 'class_id', 'class_id');
    }

    public function student_score(){
        return $this->hasOne('App\Models\QuizStudentScore', 'student_id', 'student_id');
    }

    public function quiz_event(){
        return $this->belongsTo('App\Models\QuizEvent', 'quiz_event_id', 'quiz_event_id');
    }

    public function user_profile(){
        return $this->belongsTo('App\Models\UserProfile', 'student_id', 'usr_id');
    }
}
