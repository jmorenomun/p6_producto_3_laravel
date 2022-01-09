@extends('layouts.app')

@section('content')

    <div class="row px-3">
        <div class="col">
        @if(count($enrollments) > 0)
        <div class="card card-body bg-light mt-5">

        <div class="row">
            <div class="col-6">
            <h2 class="mb-3">Enrollments</h2>
            </div>
            <div class="col-6 text-right">
            <a class="btn btn-success btn-md" href="/enrollments/create">Add New</a>
            </div>
        </div>
        <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th>Course</th>
                <th>Student</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($enrollments as $enrollment)
            <tr>
                <td>{{$enrollment->course->name}}</td>
                <td>{{ $enrollment->student->name.' '.$enrollment->student->surname }}</td>
                <td>{{ $enrollment->status ? 'Active' : 'Not Active' }}</td>
                <td><a class="btn btn-info btn-sm" href="/enrollments/{{$enrollment->id}}">View</a></td>
            </tr>
        @endforeach
            </tbody>
        </table>
        </div>

        @else
        {{-- No data --}}
        <div class="row py-5">
            <div class="col text-center">
                <h1 class="display-5 mb-5">Looks like there are no enrollments yet</h1>
                <a class="btn btn-success btn-lg" href="/enrollments/create">Create the First Enrollment</a>
            </div>
        </div>
        @endif
        </div>
    </div>

@endsection
