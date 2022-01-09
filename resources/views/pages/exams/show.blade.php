@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Exam Information</h2>
        <div class="row">
          <div class="col">
            <label for="">Name:</label>
            <h4>{{ $exam->name }}</h4>
            <label for="">Mark:</label>
            <h4>{{ $exam->mark }}</h4>
            <label for="">Course:</label>
            <h4>{{ $exam->course_offering->name }}</h4>
            <label for="">Student:</label>
            <h4>{{ $exam->student->name.' '.$exam->student->surname }}</h4>


          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <a href="/exams/{{$exam->id}}/edit" class="btn btn-success btn-block">Edit Work</a>
          </div>
          <div class="col">
            {!!Form::open(['action' => ['ExamsController@destroy', $exam->id], 'method' => 'DELETE'])!!}
                {{Form::submit('Delete Enrollment', ['class' => 'btn btn-danger btn-block'])}}
            {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row py-2">
    <div class="col text-center">
        <a class="text-secondary" href="/exams">back to exams</a>
    </div>
</div>

@endsection
