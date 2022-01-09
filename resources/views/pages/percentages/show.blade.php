@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Percentage Information</h2>
        <div class="row">
          <div class="col">
            <label for="">Course:</label>
            <h4>{{ $percentage->course->name }}</h4>
            <label for="">Student:</label>
            <h4>{{ $percentage->course_offering->name }}</h4>
            <label for="">Continuous Assesment Mark:</label>
            <h4>{{ $percentage->continuous_assessment_mark }}</h4>
            <label for="">Exams Mark:</label>
            <h4>{{ $percentage->exams_mark }}</h4>

          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <a href="/percentages/{{$percentage->id}}/edit" class="btn btn-success btn-block">Edit Percentage</a>
          </div>
          <div class="col">
            {!!Form::open(['action' => ['PercentagesController@destroy', $percentage->id], 'method' => 'DELETE'])!!}
                {{Form::submit('Delete Percentage', ['class' => 'btn btn-danger btn-block'])}}
            {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row py-2">
    <div class="col text-center">
        <a class="text-secondary" href="/percentages">back to course percentages</a>
    </div>
</div>

@endsection
