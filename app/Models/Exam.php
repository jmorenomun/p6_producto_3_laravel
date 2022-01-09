<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public function course_offering(){
        return $this->belongsTo('App\Models\CourseOffering');
    }

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }
}
