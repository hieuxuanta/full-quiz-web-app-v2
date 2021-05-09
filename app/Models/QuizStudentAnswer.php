<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizStudentAnswer extends Model
{
    use HasFactory;

    protected $table = "quiz_student_answers";
    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'student_answer',
        'student_id',
        'quiz_event_id',
        'question_id',
    ];

    public function question(){
        return $this->belongsTo('App\Models\Question', 'question_id', 'question_id');
    }
}
