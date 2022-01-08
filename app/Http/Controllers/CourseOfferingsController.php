<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CourseOffering;
use App\Models\Course;
use App\Models\Teacher;
use DB;

class CourseOfferingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course_offerings = CourseOffering::with('teacher')->orderBy('created_at','desc')->paginate(10);
        return view('pages.course_offerings.index')->with('course_offerings', $course_offerings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::select(
                                DB::raw("CONCAT(name,' ',surname) AS name"),'id')
                                    ->pluck('name', 'id');
        $courses = Course::pluck('name', 'id');

        return view('pages.course_offerings.create')->with(compact('teachers', 'courses'));
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
            'name' => 'required',
            'color' => 'required',
            'teacher_id' => 'required',
            'course_id' => 'required'
        ]);

        $course_offering = new CourseOffering;
        $course_offering->name = $request->input('name');
        $course_offering->color = $request->input('color');
        $course_offering->teacher_id = $request->input('teacher_id');
        $course_offering->course_id = $request->input('course_id');

        $course_offering->save();

        return redirect('/course_offerings')->with('success', 'Course Offering'.$course_offering->name.' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course_offering = CourseOffering::find($id);
        return view('pages.course_offerings.show')->with('course_offering', $course_offering);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $teachers = Teacher::select(
                                DB::raw("CONCAT(name,' ',surname) AS name"),'id')
                                    ->pluck('name', 'id');
        $courses = Course::pluck('name', 'id');
        $course_offering = CourseOffering::find($id);

        return view('pages.course_offerings.edit')->with(compact('teachers', 'courses', 'course_offering'));
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
            'name' => 'required',
            'color' => 'required',
            'teacher_id' => 'required',
            'course_id' => 'required'
        ]);

        $course_offering = CourseOffering::find($id);
        $course_offering->name = $request->input('name');
        $course_offering->color = $request->input('color');
        $course_offering->teacher_id = $request->input('teacher_id');
        $course_offering->course_id = $request->input('course_id');

        $course_offering->save();

        return redirect('/course_offerings')->with('success', 'Course Offering '.$course_offering->name.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course_offering = CourseOffering::find($id);

        //Check if course offering exists before deleting
        if (!isset($course_offering)){
            return redirect('/course_offerings')->with('error', 'No course offering found');
        }

        $course_offering->delete();
        return redirect('/course_offerings')->with('success', 'Course offering deleted');
    }
}
