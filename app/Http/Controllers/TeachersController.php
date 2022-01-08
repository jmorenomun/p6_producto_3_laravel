<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Teacher;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::orderBy('created_at','desc')->paginate(10);
        return view('pages.teachers.index')->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.teachers.create');
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
            'surname' => 'required',
            'telephone' => 'required',
            'nif' => 'required'
        ]);

        $teacher = new Teacher;
        $teacher->name = $request->input('name');
        $teacher->surname = $request->input('surname');
        $teacher->telephone = $request->input('telephone');
        $teacher->nif = $request->input('nif');

        $teacher->save();

        return redirect('/teachers')->with('success', 'Teacher '.$teacher->name.' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);
        return view('pages.teachers.show')->with('teacher', $teacher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return view('pages.teachers.edit')->with('teacher', $teacher);
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
            'surname' => 'required',
            'telephone' => 'required',
            'nif' => 'required'
        ]);

        $teacher = Teacher::find($id);
        $teacher->name = $request->input('name');
        $teacher->surname = $request->input('surname');
        $teacher->telephone = $request->input('telephone');
        $teacher->nif = $request->input('nif');

        $teacher->save();

        return redirect('/teachers')->with('success', 'Teacher '.$teacher->name.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);

        //Check if course exists before deleting
        if (!isset($teacher)){
            return redirect('/teachers')->with('error', 'No teacher found');
        }

        $teacher->delete();
        return redirect('/teachers')->with('success', 'Teacher deleted');
    }
}
