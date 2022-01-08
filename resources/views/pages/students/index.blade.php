@extends('layouts.app')

@section('content')

    <div class="row px-3">
        <div class="col">
        {{-- We have data --}}
        @if(count($students) > 0)
        <div class="card card-body bg-light mt-5">
        {{-- header row --}}
        <div class="row">
            <div class="col-6">
            <h2 class="mb-3">Students</h2>
            </div>
            <div class="col-6 text-right">
            <a class="btn btn-success btn-md" href="/students/create">Add New</a>
            </div>
        </div>
        <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{$student->name}}</td>
                <td>{{$student->surname}}</td>
                <td>{{ $student->user->email }}</td>
                <td><a class="btn btn-info btn-sm" href="/students/{{$student->id}}">View</a></td>
            </tr>
        @endforeach
            </tbody>
        </table>
        </div>

        @else
        {{-- No data --}}
        <div class="row py-5">
            <div class="col text-center">
                <h1 class="display-5 mb-5">Looks like there are no students yet</h1>
                <a class="btn btn-success btn-lg" href="/courses/create">Create the First Course</a>
            </div>
        </div>

        @endif
        </div>
    </div>

@endsection
