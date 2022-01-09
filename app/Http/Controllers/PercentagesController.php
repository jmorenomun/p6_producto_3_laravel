<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Percentage;
use App\Models\CourseOffering;
use App\Models\Course;
use DB;

class PercentagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $percentages = Percentage::all();

        return view('pages.percentages.index')->with('percentages', $percentages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::pluck('name', 'id');
        $course_offerings = CourseOffering::pluck('name', 'id');
        return view('pages.percentages.create')->with(compact('courses', 'course_offerings'));
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
        'course_offering_id' => 'required',
        'continuous_assessment_mark' => 'required',
        'exams_mark' => 'required'
        ]);

        $percentage = new Percentage;
        $percentage->course_id = $request->input('course_id');
        $percentage->course_offering_id = $request->input('course_offering_id');
        $percentage->continuous_assessment_mark = $request->input('continuous_assessment_mark');
        $percentage->exams_mark = $request->input('exams_mark');

        $percentage->save();

        return redirect('/percentages')->with('success', 'Percentage created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $percentage = Percentage::find($id);
        return view('pages.percentages.show')->with('percentage', $percentage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $percentage = Percentage::find($id);
        $courses = Course::pluck('name', 'id');
        $course_offerings = CourseOffering::pluck('name', 'id');
        return view('pages.percentages.edit')->with(compact('percentage', 'courses', 'course_offerings'));
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
        'course_offering_id' => 'required',
        'continuous_assessment_mark' => 'required',
        'exams_mark' => 'required'
        ]);

        $percentage = Percentage::find($id);
        $percentage->course_id = $request->input('course_id');
        $percentage->course_offering_id = $request->input('course_offering_id');
        $percentage->continuous_assessment_mark = $request->input('continuous_assessment_mark');
        $percentage->exams_mark = $request->input('exams_mark');

        $percentage->save();

        return redirect('/percentages')->with('success', 'Percentage has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $percentage = Percentage::find($id);

        //Check if enrollemnt exists before deleting
        if (!isset($percentage)){
            return redirect('/percentages')->with('error', 'No percentage found');
        }

        $percentage->delete();

        return redirect('/percentages')->with('success', 'Percentage deleted');
    }
}
