<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = "subjects";
    protected $primaryKey = "subject_id";
    // public $timestamps = false;

    protected $fillable = [
        'subject_code',
        'subject_desc'
    ];

    public function classe(){
        return $this->hasMany('App\Models\Classe', 'subject_id', 'subject_id');
    }

}
