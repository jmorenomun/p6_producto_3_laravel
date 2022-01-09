<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function enrollments(){
        return $this->hasMany('App\Models\Enrollment');
    }

    public function works(){
        return $this->hasMany('App\Models\Work');
    }

    public function exams(){
        return $this->hasMany('App\Models\Exam');
    }
}
