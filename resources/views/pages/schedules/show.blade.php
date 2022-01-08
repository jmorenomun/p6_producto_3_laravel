@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Teacher Information</h2>
        <div class="row">
          <div class="col">
            <label for="">Name:</label>
            <h4>{{ $teacher->name }}</h4>
            <label for="">Surname:</label>
            <h4>{{ $teacher->surname }}</h4>
            <label for="">Telephone:</label>
            <h4>{{ $teacher->telephone }}</h4>
            <label for="">NIF:</label>
            <h4>{{ $teacher->nif }}</h4>
            <label for="">Created:</label>
            <h4>{{ date_format(date_create($teacher->created_at), 'd M, Y') }}</h4>
            <label for="">Updated:</label>
            <h4>{{ date_format(date_create($teacher->updated_at), 'd M, Y') }}</h4>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <a href="/teachers/{{$teacher->id}}/edit" class="btn btn-success btn-block">Edit Teacher</a>
          </div>
          <div class="col">
            {!!Form::open(['action' => ['TeachersController@destroy', $teacher->id], 'method' => 'DELETE'])!!}
                {{Form::submit('Delete Teacher', ['class' => 'btn btn-danger btn-block'])}}
            {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row py-2">
    <div class="col text-center">
        <a class="text-secondary" href="/teachers">back to teachers</a>
    </div>
</div>

@endsection
