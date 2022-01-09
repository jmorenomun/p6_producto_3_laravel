<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseOffering extends Model
{
    use HasFactory;

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher');
    }

    public function works(){
        return $this->hasMany('App\Models\Work');
    }

    public function exams(){
        return $this->hasMany('App\Models\Exam');
    }

    public function percentages(){
        return $this->hasMany('App\Models\Percentage');
    }

}
