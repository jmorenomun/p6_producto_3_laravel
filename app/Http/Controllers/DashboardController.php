<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Work;
use App\Models\Exam;
use App\Models\Enrollment;
use App\Models\CourseOffering;
use App\Models\Percentage;

class DashboardController extends Controller
{

    public function index(){
    }

    public function dashboard(){
        if(Auth::guest()){
            return redirect()->intended('/login');
        }
        
        switch (Auth::user()->userable_type) {
            case 'student':
                $redir_view = '/dashboard/record';
                break;
            
            case 'user_admin':
                $redir_view = '/courses';
                break;
        }
        
        return redirect()->intended($redir_view);
    }

    public function record(){
        $student_id = Auth::user()->userable_id;
        $works = Work::where('student_id', '=', $student_id)->get();
        $exams = Exam::where('student_id', '=', $student_id)->get();
        $marks_summary = Array();
        $enrollments = Enrollment::where('student_id', '=', $student_id)->get();

        foreach ($enrollments as $enrollment) {
            
            $course_offering = CourseOffering::where('course_id', $enrollment->course_id)->firstOrFail();
            $avg_works = Work::where([['student_id', $student_id], ['course_offering_id', $course_offering->id]])->avg('mark');
            $works_value = Percentage::select('continuous_assessment_mark')->where('course_id', $enrollment->course_id)->firstOrFail()->continuous_assessment_mark;
            $avg_exams = Exam::where([['student_id', $student_id], ['course_offering_id', $course_offering->id]])->avg('mark');
            $exams_value = Percentage::select('exams_mark')->where('course_id', $enrollment->course_id)->firstOrFail()->exams_mark;
            $final_mark = ($avg_works * $works_value) + ($avg_exams * $exams_value);
            $course_summary = [
                "course_offering" => $course_offering->name,
                "avg_works" => $avg_works,
                "works_value" => $works_value * 100,
                "avg_exams" => $avg_exams,
                "exams_value" => $exams_value * 100,
                "final_mark" => $final_mark
            ];
            array_push($marks_summary, $course_summary);
        }
       
        return view('pages.dashboard.student.record')->with(compact('works', 'exams', 'marks_summary'));
    }

    public function courses(){
        
        return view('pages.dashboard.student.courses')->with('courses', $courses);
    }
}
