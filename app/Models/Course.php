<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function course_offerings(){
        return $this->hasMany('App\Models\CourseOffering');
    }

    public function enrollments(){
        return $this->hasMany('App\Models\Enrollment');
    }

    public function percentages(){
        return $this->hasMany('App\Models\Percentage');
    }
}
