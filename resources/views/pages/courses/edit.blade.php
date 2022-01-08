@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Edit course {{ $course->name }}</h2>
            {!! Form::open(['action' => ['CoursesController@update', $course->id], 'method' => 'PATCH']) !!}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', $course->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
              </div>
              <div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::textarea('description', $course->description, ['class' => 'form-control', 'placeholder' => 'Description']) }}
              </div>
              <div class="form-group">
                {{ Form::label('date_start', 'Start Date') }}
                {{ Form::date('date_start', date_format(date_create($course->date_start), 'Y-m-d'), ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('date_end', 'End Date') }}
                {{ Form::date('date_end', date_format(date_create($course->date_end), 'Y-m-d'), ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('active', 'Active') }}
                {{ Form::select('active', [0 => 'Not Active', 1 => 'Active'], $course->active, ['class' => 'form-control']) }}
              </div>
              <div class="row">
                <div class="col-6">
                    {{ Form::submit('Update', ['class' => 'btn btn-success btn-block']) }}
                </div>
                  <div class="col-6">
                      <a href="/courses/{{$course->id}}" class="btn btn-secondary btn-block">Cancel</a>
                  </div>
              </div>

            {!! Form::close() !!}
        </div>
        </div>
    </div>
@endsection
