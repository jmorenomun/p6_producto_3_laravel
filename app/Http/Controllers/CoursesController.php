<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('created_at','desc')->paginate(10);
        return view('pages.courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.courses.create');
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
            'description' => 'required',
            'date_start' => 'required',
            'date_end' => 'required'
        ]);

        $course = new Course;
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->date_start = $request->input('date_start');
        $course->date_end = $request->input('date_end');
        $course->active = $request->input('active');

        $course->save();

        return redirect('/courses')->with('success', 'Course '.$course->name.' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return view('pages.courses.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('pages.courses.edit')->with('course', $course);
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
            'description' => 'required',
            'date_start' => 'required',
            'date_end' => 'required'
        ]);

        $course = Course::find($id);
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->date_start = $request->input('date_start');
        $course->date_end = $request->input('date_end');
        $course->active = $request->input('active');

        $course->save();

        return redirect('/courses')->with('success', 'Course '.$course->name.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);

        //Check if course exists before deleting
        if (!isset($course)){
            return redirect('/courses')->with('error', 'No course found');
        }

        $course->delete();
        return redirect('/courses')->with('success', 'Course deleted');

    }
}
