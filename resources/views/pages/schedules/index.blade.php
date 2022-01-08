@extends('layouts.app')

@section('content')

    <div class="row px-3">
        <div class="col">
        @if(count($teachers) > 0)
        <div class="card card-body bg-light mt-5">

        <div class="row">
            <div class="col-6">
            <h2 class="mb-3">Teachers</h2>
            </div>
            <div class="col-6 text-right">
            <a class="btn btn-success btn-md" href="/teachers/create">Add New</a>
            </div>
        </div>
        <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Telephone</th>
                <th>NIF</th>
                <th>Created</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($teachers as $teacher)
            <tr>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->surname}}</td>
                <td>{{ $teacher->telephone }}</td>
                <td>{{ $teacher->nif }}</td>
                <td>{{ date_format(date_create($teacher->created_at), 'd M, Y') }}</td>
                <td><a class="btn btn-info btn-sm" href="/teachers/{{$teacher->id}}">View</a></td>
            </tr>
        @endforeach
            </tbody>
        </table>
        </div>

        @else
        {{-- No data --}}
        <div class="row py-5">
            <div class="col text-center">
                <h1 class="display-5 mb-5">Looks like there are no teachers yet</h1>
                <a class="btn btn-success btn-lg" href="/teachers/create">Create the First Teacher</a>
            </div>
        </div>
        @endif
        </div>
    </div>

@endsection
