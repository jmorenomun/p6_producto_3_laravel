@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Add a New Course Offering</h2>
            {!! Form::open(['action' => 'CourseOfferingsController@store', 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
              </div>
              <div class="form-group">
                {{ Form::label('color', 'Color') }}
                {{ Form::select('color', config('enums.course_offering_colors'), '', ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('teacher', 'Teacher') }}
                {{ Form::select('teacher_id', $teachers, null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('course', 'Course') }}
                {{ Form::select('course_id', $courses, null, ['class' => 'form-control']) }}
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
            <a class="text-secondary" href="/course_offerings">back to course offerings</a>
        </div>
    </div>
@endsection
