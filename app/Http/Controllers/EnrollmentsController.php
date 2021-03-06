<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use DB;


class EnrollmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrollments = Enrollment::all();

        return view('pages.enrollments.index')->with('enrollments', $enrollments);
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
        $courses = Course::pluck('name', 'id');
        return view('pages.enrollments.create')->with(compact('courses', 'students'));
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
            'course_id' => 'required',
            'student_id' => 'required',
            'status' => 'required'
        ]);

        $enrollment = new Enrollment;
        $enrollment->course_id = $request->input('course_id');
        $enrollment->student_id = $request->input('student_id');
        $enrollment->status = $request->input('status');

        $enrollment->save();

        return redirect('/enrollments')->with('success', 'Enrollment created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enrollment = Enrollment::find($id);
        return view('pages.enrollments.show')->with('enrollment', $enrollment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enrollment = Enrollment::find($id);
        $students = Student::select(
            DB::raw("CONCAT(name,' ',surname) AS name"),'id')
                ->pluck('name', 'id');;
        $courses = Course::pluck('name', 'id');
        return view('pages.enrollments.edit')->with(compact('enrollment','courses', 'students'));
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
            'course_id' => 'required',
            'student_id' => 'required',
            'status' => 'required'
        ]);

        $enrollment = Enrollment::find($id);
        $enrollment->course_id = $request->input('course_id');
        $enrollment->student_id = $request->input('student_id');
        $enrollment->status = $request->input('status');

        $enrollment->save();

        return redirect('/enrollments')->with('success', 'Enrollment created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enrollment = Enrollment::find($id);

        //Check if enrollemnt exists before deleting
        if (!isset($enrollment)){
            return redirect('/enrollments')->with('error', 'No enrollment found');
        }

        $enrollment->delete();

        return redirect('/enrollments')->with('success', 'Enrollment deleted');

    }
}
