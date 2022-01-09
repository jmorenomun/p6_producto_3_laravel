<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Work;
use App\Models\Student;
use App\Models\CourseOffering;
use DB;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::all();

        return view('pages.works.index')->with('works', $works);
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
        return view('pages.works.create')->with(compact('course_offerings', 'students'));
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

        $work = new Work;
        $work->course_offering_id = $request->input('course_offering_id');
        $work->student_id = $request->input('student_id');
        $work->name = $request->input('name');
        $work->mark = $request->input('mark');

        $work->save();

        return redirect('/works')->with('success', 'Work created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $work = Work::find($id);
        return view('pages.works.show')->with('work', $work);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Work::find($id);
        $students = Student::select(
            DB::raw("CONCAT(name,' ',surname) AS name"),'id')
                ->pluck('name', 'id');;
        $course_offerings = CourseOffering::pluck('name', 'id');
        return view('pages.works.edit')->with(compact('work', 'course_offerings', 'students'));
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

        $work = Work::find($id);
        $work->course_offering_id = $request->input('course_offering_id');
        $work->student_id = $request->input('student_id');
        $work->name = $request->input('name');
        $work->mark = $request->input('mark');

        $work->save();

        return redirect('/works')->with('success', 'Work '.$work->name.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Work::find($id);

        //Check if enrollemnt exists before deleting
        if (!isset($work)){
            return redirect('/works')->with('error', 'No work found');
        }

        $work->delete();

        return redirect('/works')->with('success', 'Work deleted');
    }
}
