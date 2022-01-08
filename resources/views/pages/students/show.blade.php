@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Course Information</h2>
        <div class="row">
          <div class="col">
            <label for="">Name:</label>
            <h4>{{ $course->name }}</h4>
            <label for="">Description:</label>
            <h4>{{ $course->description }}</h4>
            <label for="">Date start:</label>
            <h4>{{ date_format(date_create($course->date_start), 'd M, Y') }}</h4>
            <label for="">Date end:</label>
            <h4>{{ date_format(date_create($course->date_end), 'd M, Y') }}</h4>
            <label for="">Active:</label>
            <h4>This course is {{$course->active ? 'active' : 'not active'}}</h4>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <a href="/courses/{{$course->id}}/edit" class="btn btn-success btn-block">Edit Course</a>
          </div>
          <div class="col">
            {!!Form::open(['action' => ['CoursesController@destroy', $course->id], 'method' => 'DELETE'])!!}
                {{Form::submit('Delete Course', ['class' => 'btn btn-danger btn-block'])}}
            {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
