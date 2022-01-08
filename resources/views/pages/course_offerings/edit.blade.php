@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Edit {{ $course_offering->name}}</h2>
            {!! Form::open(['action' => ['CourseOfferingsController@update', $course_offering->id], 'method' => 'PATCH']) !!}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', $course_offering->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('color', 'Color') }}
                {{ Form::select('color', config('enums.course_offering_colors'), $course_offering->color, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('teacher', 'Teacher') }}
                {{ Form::select('teacher_id', $teachers, $course_offering->teacher_id, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('course', 'Course') }}
                {{ Form::select('course_id', $courses, $course_offering->course_id, ['class' => 'form-control']) }}
            </div>
              <div class="row">
                <div class="col-6">
                    {{ Form::submit('Update', ['class' => 'btn btn-success btn-block']) }}
                </div>
                  <div class="col-6">
                      <a href="/course_offerings/{{$course_offering->id}}" class="btn btn-secondary btn-block">Cancel</a>
                  </div>
              </div>

            {!! Form::close() !!}
        </div>
        </div>
    </div>
@endsection
