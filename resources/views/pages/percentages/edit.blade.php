@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Edit Percentage</h2>
            {!! Form::open(['action' => ['PercentagesController@update', $percentage->id], 'method' => 'PATCH']) !!}

            <div class="form-group">
                {{ Form::label('course', 'Course') }}
                {{ Form::select('course_id', $courses, $percentage->course_id, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('course_offering_id', 'Course Offering') }}
                {{ Form::select('course_offering_id', $course_offerings, $percentage->course_offering_id, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('continuous_assessment_mark', 'Continuous Assessment Mark') }}
                {{ Form::number('continuous_assessment_mark', $percentage->continuous_assessment_mark, ['class' => 'form-control', 'step' => '.1', 'min' => 0, 'max' => 10]) }}
              </div>
              <div class="form-group">
                {{ Form::label('exams_mark', 'Exams Mark') }}
                {{ Form::number('exams_mark', $percentage->exams_mark, ['class' => 'form-control', 'step' => '.1', 'min' => 0, 'max' => 10]) }}
              </div>
              <div class="row">
                <div class="col-6">
                    {{ Form::submit('Update', ['class' => 'btn btn-success btn-block']) }}
                </div>
                  <div class="col-6">
                      <a href="/percentages/{{$percentage->id}}" class="btn btn-secondary btn-block">Cancel</a>
                  </div>
              </div>

            {!! Form::close() !!}
        </div>
        </div>
    </div>
@endsection
