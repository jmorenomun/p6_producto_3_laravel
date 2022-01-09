<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Exam;
use App\Models\Student;
use App\Models\CourseOffering;
use DB;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::all();

        return view('pages.exams.index')->with('exams', $exams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::select(
            DB::raw("CONCAT(name,' ',surname) AS name"),'id')
                ->pluck('name', 'id');;
        $course_offerings = CourseOffering::pluck('name', 'id');
        return view('pages.exams.create')->with(compact('course_offerings', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate fields
        $this->validate($request, [
            'course_offering_id' => 'required',
            'student_id' => 'required',
            'name' => 'required',
            'mark' => 'required'
        ]);

        $exam = new Exam;
        $exam->course_offering_id = $request->input('course_offering_id');
        $exam->student_id = $request->input('student_id');
        $exam->name = $request->input('name');
        $exam->mark = $request->input('mark');

        $exam->save();

        return redirect('/exams')->with('success', 'Exam created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = Exam::find($id);
        return view('pages.exams.show')->with('exam', $exam);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::find($id);
        $students = Student::select(
            DB::raw("CONCAT(name,' ',surname) AS name"),'id')
                ->pluck('name', 'id');;
        $course_offerings = CourseOffering::pluck('name', 'id');
        return view('pages.exams.edit')->with(compact('exam', 'course_offerings', 'students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate fields
        $this->validate($request, [
            'course_offering_id' => 'required',
            'student_id' => 'required',
            'name' => 'required',
            'mark' => 'required'
        ]);

        $exam = Exam::find($id);
        $exam->course_offering_id = $request->input('course_offering_id');
        $exam->student_id = $request->input('student_id');
        $exam->name = $request->input('name');
        $exam->mark = $request->input('mark');

        $exam->save();

        return redirect('/exams')->with('success', 'Exam '.$exam->name.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::find($id);

        //Check if enrollemnt exists before deleting
        if (!isset($exam)){
            return redirect('/exams')->with('error', 'No exam found');
        }

        $exam->delete();

        return redirect('/exams')->with('success', 'Exam deleted');
    }
}
