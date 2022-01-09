@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Edit {{ $student->name.' '.$student->surname }}</h2>
            {!! Form::open(['action' => ['StudentsController@update', $student->id], 'method' => 'PATCH']) !!}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', $student->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
          </div>
          <div class="form-group">
            {{ Form::label('surname', 'Surname') }}
            {{ Form::text('surname', $student->surname, ['class' => 'form-control', 'placeholder' => 'Surname']) }}
          </div>
          <div class="form-group">
            {{ Form::label('telephone', 'Telephone') }}
            {{ Form::text('telephone', $student->telephone, ['class' => 'form-control', 'placeholder' => 'Telephone']) }}
          </div>
          <div class="form-group">
            {{ Form::label('nif', 'NIF') }}
            {{ Form::text('nif', $student->nif, ['class' => 'form-control', 'placeholder' => 'NIF']) }}
          </div>
              <div class="row">
                <div class="col-6">
                    {{ Form::submit('Update', ['class' => 'btn btn-success btn-block']) }}
                </div>
                  <div class="col-6">
                      <a href="/students/{{$student->id}}" class="btn btn-secondary btn-block">Cancel</a>
                  </div>
              </div>

            {!! Form::close() !!}
        </div>
        </div>
    </div>
@endsection
