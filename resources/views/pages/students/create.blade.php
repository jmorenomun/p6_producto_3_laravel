@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Add a New Course</h2>
            {!! Form::open(['action' => 'CoursesController@store', 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
              </div>
              <div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description']) }}
              </div>
              <div class="form-group">
                {{ Form::label('date_start', 'Start Date') }}
                {{ Form::date('date_start', '', ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('date_end', 'End Date') }}
                {{ Form::date('date_end', '', ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('active', 'Active') }}
                {{ Form::select('active', [0 => 'Not Active', 1 => 'Active'], 1, ['class' => 'form-control']) }}
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
            <a class="text-secondary" href="/courses">back to courses</a>
        </div>
    </div>
@endsection
