<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;

    protected $table = "questionnaires";
    protected $primaryKey = "questionnaire_id";

    protected $fillable = [
        'questionnaire_name',
        'questionnaire_id'
    ];

    public function question(){
        return $this->hasMany('App\Models\Question', 'questionnaire_id', 'questionnaire_id');
    }


}
