@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Course Offering Information</h2>
        <div class="row">
          <div class="col">
            <label for="">Course:</label>
            <h4>{{ $enrollment->course->name }}</h4>
            <label for="">Student:</label>
            <h4>{{ $enrollment->student->name.' '.$enrollment->student->surname }}</h4>
            <label for="">Status:</label>
            <h4>{{ $enrollment->status ? 'Active' : 'Not Active' }}</h4>

          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <a href="/enrollments/{{$enrollment->id}}/edit" class="btn btn-success btn-block">Edit Enrollment</a>
          </div>
          <div class="col">
            {!!Form::open(['action' => ['EnrollmentsController@destroy', $enrollment->id], 'method' => 'DELETE'])!!}
                {{Form::submit('Delete Enrollment', ['class' => 'btn btn-danger btn-block'])}}
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
