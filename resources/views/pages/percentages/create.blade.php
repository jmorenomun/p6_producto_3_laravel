@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Add a New Percentage</h2>
            {!! Form::open(['action' => 'PercentagesController@store', 'method' => 'POST']) !!}

              <div class="form-group">
                {{ Form::label('course', 'Course') }}
                {{ Form::select('course_id', $courses, null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('course_offering_id', 'Course Offering') }}
                {{ Form::select('course_offering_id', $course_offerings, null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('continuous_assessment_mark', 'Continuous Assessment Mark') }}
                {{ Form::number('continuous_assessment_mark', 0, ['class' => 'form-control', 'step' => '.1', 'min' => 0, 'max' => 10]) }}
              </div>
              <div class="form-group">
                {{ Form::label('exams_mark', 'Exams Mark') }}
                {{ Form::number('exams_mark', 0, ['class' => 'form-control', 'step' => '.1', 'min' => 0, 'max' => 10]) }}
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
            <a class="text-secondary" href="/percentages">back to percentages</a>
        </div>
    </div>
@endsection
