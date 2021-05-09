<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizStudentScore extends Model
{
    use HasFactory;

    protected $table = "quiz_student_scores";
    protected $primaryKey = null;
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'score',
        'student_id',
        'quiz_event_id',
        'recorded_on'
    ];

    public function quiz_event(){
        return $this->belongsTo('App\Models\QuizEvent', 'quiz_event_id', 'quiz_event_id');
    }

    public function user_profile(){
        return $this->belongsTo('App\Models\UserProfile', 'student_id', 'usr_id');
    }
}
