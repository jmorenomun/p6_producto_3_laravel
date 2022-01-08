<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function course_offerings(){
        return $this->hasMany('App\CourseOfferings');
    }

    public function getFullNameAttribute(){
        return $this->name . ' ' . $this->surname;
    }

}
