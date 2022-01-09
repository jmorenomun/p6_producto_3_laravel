@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Add a New Work</h2>
            {!! Form::open(['action' => 'WorksController@store', 'method' => 'POST']) !!}
              <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
              </div>
              <div class="form-group">
                {{ Form::label('mark', 'Mark') }}
                {{ Form::number('mark', 0.0, ['class' => 'form-control', 'step' => '0.1', 'min' => 0]) }}
              </div>
              <div class="form-group">
                {{ Form::label('course_offering_id', 'Course Offering') }}
                {{ Form::select('course_offering_id', $course_offerings, null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('student_id', 'Student') }}
                {{ Form::select('student_id', $students, null, ['class' => 'form-control']) }}
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
            <a class="text-secondary" href="/works">back to works</a>
        </div>
    </div>
@endsection
