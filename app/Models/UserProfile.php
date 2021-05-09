<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table = "user_profiles";
    protected $primaryKey = "usr_id";
    // public $timestamps = false;

    protected $fillable = [
        'usr_id',
        // 'given_name',
        'usr_identification_numb',
        'full_name',
        // 'middle_name',
        'ext_name'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'usr_id', 'usr_id');
    }
}
