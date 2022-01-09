@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Add a New Enrollment</h2>
            {!! Form::open(['action' => 'EnrollmentsController@store', 'method' => 'POST']) !!}

              <div class="form-group">
                {{ Form::label('course', 'Course') }}
                {{ Form::select('course_id', $courses, null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('student', 'Student') }}
                {{ Form::select('student_id', $students, null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('status', 'Status') }}
                {{ Form::select('status', [0 => 'Not Active', 1 => 'Active'], 1, ['class' => 'form-control']) }}
              </div>
              <div class="row">
                  <div class="col">
                      {{ Form::submit('Create', ['class' => 'btn btn-success btn-block']) }}
                  </div>
              </div>

            {!! Form::close() !!}
        </div>
        </div>
    </div>

    <div class="row py-2">
        <div class="col text-center">
            <a class="text-secondary" href="/entollments">back to enrollments</a>
        </div>
    </div>
@endsection
