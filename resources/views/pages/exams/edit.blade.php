@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Edit Exam</h2>
            {!! Form::open(['action' => ['ExamsController@update', $exam->id], 'method' => 'PATCH']) !!}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', $exam->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
              </div>
              <div class="form-group">
                {{ Form::label('mark', 'Mark') }}
                {{ Form::number('mark', $exam->mark, ['class' => 'form-control', 'step' => '0.1', 'min' => 0]) }}
              </div>
              <div class="form-group">
                {{ Form::label('course_offering_id', 'Course Offering') }}
                {{ Form::select('course_offering_id', $course_offerings,  $exam->course_offering_id, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('student_id', 'Student') }}
                {{ Form::select('student_id', $students, $exam->student_id, ['class' => 'form-control']) }}
              </div>
              <div class="row">
                <div class="col-6">
                    {{ Form::submit('Update', ['class' => 'btn btn-success btn-block']) }}
                </div>
                  <div class="col-6">
                      <a href="/exams/{{$exam->id}}" class="btn btn-secondary btn-block">Cancel</a>
                  </div>
              </div>

            {!! Form::close() !!}
        </div>
        </div>
    </div>
@endsection
