<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $table = "classes";
    protected $primaryKey = "class_id";
    public $incrementing = false;

    protected $fillable = [
        'class_id',
        'course_sec',
        'class_active',
        'instructor_id',
        'subject_id',
    ];

    public function subject(){
        return $this->belongsTo('App\Models\Subject', 'subject_id', 'subject_id');
    }

    public function student_class(){
        return $this->hasMany('App\Models\StudentClasse', 'class_id', 'class_id');
    }

    public function quiz_event(){
        return $this->belongsTo('App\Models\QuizEvent', 'class_id', 'class_id');
    }
}
