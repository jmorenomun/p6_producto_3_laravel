<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\User;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('pages.students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.students.create');
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

        $student = new Student;
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->username = strtolower($student->name.$student->surname).substr(time(), -4);
        $student->telephone = $request->input('telephone');
        $student->nif = $request->input('nif');

        $student->save();
        $student = $student->fresh();

        $user = new User;
        $user->name = $student->username;
        $user->email = $request->input('email');
        $user->password = uniqid();
        $user->userable_id = $student->id;
        $user->userable_type = 'student';

        $user->save();
        $user = $user->fresh();

        $student->user_id = $user->id;
        $student->save();

        return redirect('/students')->with('success', 'Student '.$student->name.' '.$student->surname.' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('pages.students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('pages.students.edit')->with('student', $student);
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

        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->telephone = $request->input('telephone');
        $student->nif = $request->input('nif');

        $student->save();

        return redirect('/students')->with('success', 'Student '.$student->name.' '.$student->surname.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $user_id = $student->user_id;

        //Check if course exists before deleting
        if (!isset($student)){
            return redirect('/students')->with('error', 'No student found');
        }

        if($student->delete()){
            $user = User::find($user_id);
            $user->delete();
            return redirect('/students')->with('success', 'Student deleted');
        }
    }
}
