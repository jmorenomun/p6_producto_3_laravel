@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Add a New Student</h2>
            {!! Form::open(['action' => 'StudentsController@store', 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
              </div>
              <div class="form-group">
                {{ Form::label('surname', 'Surname') }}
                {{ Form::text('surname', '', ['class' => 'form-control', 'placeholder' => 'Surname']) }}
              </div>
              <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) }}
              </div>
              <div class="form-group">
                {{ Form::label('telephone', 'Telephone') }}
                {{ Form::text('telephone', '', ['class' => 'form-control', 'placeholder' => 'Telephone']) }}
              </div>
              <div class="form-group">
                {{ Form::label('nif', 'NIF') }}
                {{ Form::text('nif', '', ['class' => 'form-control', 'placeholder' => 'NIF']) }}
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
            <a class="text-secondary" href="/students">back to students</a>
        </div>
    </div>
@endsection
