@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Student Information</h2>
        <div class="row">
          <div class="col">
            <label for="">Name:</label>
            <h4>{{ $student->name }}</h4>
            <label for="">Surname:</label>
            <h4>{{ $student->surname }}</h4>
            <label for="">Username:</label>
            <h4>{{ $student->username }}</h4>
            <label for="">Email:</label>
            <h4>{{ $student->user->email }}</h4>
            <label for="">Telephone:</label>
            <h4>{{ $student->telephone }}</h4>
            <label for="">NIF:</label>
            <h4>{{ $student->nif }}</h4>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <a href="/students/{{$student->id}}/edit" class="btn btn-success btn-block">Edit Student</a>
          </div>
          <div class="col">
            {!!Form::open(['action' => ['StudentsController@destroy', $student->id], 'method' => 'DELETE'])!!}
                {{Form::submit('Delete Student', ['class' => 'btn btn-danger btn-block'])}}
            {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
