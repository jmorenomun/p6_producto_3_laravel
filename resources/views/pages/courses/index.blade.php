@extends('layouts.app')

@section('content')

    <div class="row px-3">
        <div class="col">
        {{-- We have data --}}
        @if(count($courses) > 0)
        <div class="card card-body bg-light mt-5">
        {{-- header row --}}
        <div class="row">
            <div class="col-6">
            <h2 class="mb-3">Courses</h2>
            </div>
            <div class="col-6 text-right">
            <a class="btn btn-success btn-md" href="/courses/create">Add New</a>
            </div>
        </div>
        <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Active</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($courses as $course)
            <tr>
                <td>{{$course->name}}</td>
                <td>{{$course->description}}</td>
                <td>{{ date_format(date_create($course->date_start), 'd M, Y') }}</td>
                <td>{{ date_format(date_create($course->date_end), 'd M, Y') }}</td>
                <td>{{$course->active ? 'active' : 'not active'}}</td>
                <td><a class="btn btn-info btn-sm" href="/courses/{{$course->id}}">View</a></td>
            </tr>
        @endforeach
            </tbody>
        </table>
        </div>

        @else
        {{-- No data --}}
        <div class="row py-5">
            <div class="col text-center">
                <h1 class="display-5 mb-5">Looks like there are no courses yet</h1>
                <a class="btn btn-success btn-lg" href="/courses/create">Create the First Course</a>
            </div>
        </div>

        @endif
        </div>
    </div>

@endsection
