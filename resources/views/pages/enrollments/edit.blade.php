@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Edit Enrollment</h2>
            {!! Form::open(['action' => ['EnrollmentsController@update', $enrollment->id], 'method' => 'PATCH']) !!}

            <div class="form-group">
                {{ Form::label('course', 'Course') }}
                {{ Form::select('course_id', $courses, $enrollment->course_id, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('student', 'Student') }}
                {{ Form::select('student_id', $students, $enrollment->student_id, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('status', 'Status') }}
                {{ Form::select('status', [0 => 'Not Active', 1 => 'Active'], $enrollment->status, ['class' => 'form-control']) }}
              </div>
              <div class="row">
                <div class="col-6">
                    {{ Form::submit('Update', ['class' => 'btn btn-success btn-block']) }}
                </div>
                  <div class="col-6">
                      <a href="/enrollments/{{$enrollment->id}}" class="btn btn-secondary btn-block">Cancel</a>
                  </div>
              </div>

            {!! Form::close() !!}
        </div>
        </div>
    </div>
@endsection
