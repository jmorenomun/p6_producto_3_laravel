@extends('layouts.app')

@section('content')

    <div class="row px-3">
        <div class="col">
        @if(count($course_offerings) > 0)
        <div class="card card-body bg-light mt-5">

        <div class="row">
            <div class="col-6">
            <h2 class="mb-3">Course Offerings</h2>
            </div>
            <div class="col-6 text-right">
            <a class="btn btn-success btn-md" href="/course_offerings/create">Add New</a>
            </div>
        </div>
        <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th>Name</th>
                <th>Color</th>
                <th>Teacher</th>
                <th>Course</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($course_offerings as $course_offering)
            <tr>
                <td>{{$course_offering->name}}</td>
                <td>{{ config('enums.course_offering_colors')[$course_offering->color] }}</td>
                <td>{{ $course_offering->teacher->name.' '.$course_offering->teacher->surname }}</td>
                <td>{{ $course_offering->course->name }}</td>
                <td><a class="btn btn-info btn-sm" href="/course_offerings/{{$course_offering->id}}">View</a></td>
            </tr>
        @endforeach
            </tbody>
        </table>
        </div>

        @else
        {{-- No data --}}
        <div class="row py-5">
            <div class="col text-center">
                <h1 class="display-5 mb-5">Looks like there are no course offerings yet</h1>
                <a class="btn btn-success btn-lg" href="/course_offerings/create">Create the First Course Offering</a>
            </div>
        </div>
        @endif
        </div>
    </div>

@endsection
