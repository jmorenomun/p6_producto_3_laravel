@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Course Offering Information</h2>
        <div class="row">
          <div class="col">
            <label for="">Name:</label>
            <h4>{{ $course_offering->name }}</h4>
            <label for="">Color:</label>
            <h4>{{ config('enums.course_offering_colors')[$course_offering->color] }}</h4>
            <label for="">Course:</label>
            <h4>{{ $course_offering->course->name }}</h4>
            <label for="">Teacher:</label>
            <h4>{{ $course_offering->teacher->name.' '.$course_offering->teacher->surname }}</h4>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <a href="/course_offerings/{{$course_offering->id}}/edit" class="btn btn-success btn-block">Edit Course Offering</a>
          </div>
          <div class="col">
            {!!Form::open(['action' => ['CourseOfferingsController@destroy', $course_offering->id], 'method' => 'DELETE'])!!}
                {{Form::submit('Delete Course Offering', ['class' => 'btn btn-danger btn-block'])}}
            {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row py-2">
    <div class="col text-center">
        <a class="text-secondary" href="/course_offerings">back to course offerings</a>
    </div>
</div>

@endsection
