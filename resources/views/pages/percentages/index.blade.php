@extends('layouts.app')

@section('content')

    <div class="row px-3">
        <div class="col">
        @if(count($percentages) > 0)
        <div class="card card-body bg-light mt-5">

        <div class="row">
            <div class="col-6">
            <h2 class="mb-3">Percentages</h2>
            </div>
            <div class="col-6 text-right">
            <a class="btn btn-success btn-md" href="/percentages/create">Add New</a>
            </div>
        </div>
        <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th>Course</th>
                <th>Course Offering</th>
                <th>CA</th>
                <th>Exams</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($percentages as $percentage)
            <tr>
                <td>{{$percentage->course->name}}</td>
                <td>{{$percentage->course_offering->name}}</td>

                <td>{{ $percentage->continuous_assessment_mark }}</td>
                <td>{{ $percentage->exams_mark  }}</td>
                <td><a class="btn btn-info btn-sm" href="/percentages/{{$percentage->id}}">View</a></td>
            </tr>
        @endforeach
            </tbody>
        </table>
        </div>

        @else
        {{-- No data --}}
        <div class="row py-5">
            <div class="col text-center">
                <h1 class="display-5 mb-5">Looks like there are no percentages yet</h1>
                <a class="btn btn-success btn-lg" href="/percentages/create">Create the First Percentage</a>
            </div>
        </div>
        @endif
        </div>
    </div>

@endsection
