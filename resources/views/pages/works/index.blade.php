@extends('layouts.app')

@section('content')

    <div class="row px-3">
        <div class="col">
        @if(count($works) > 0)
        <div class="card card-body bg-light mt-5">

        <div class="row">
            <div class="col-6">
            <h2 class="mb-3">Works</h2>
            </div>
            <div class="col-6 text-right">
            <a class="btn btn-success btn-md" href="/works/create">Add New</a>
            </div>
        </div>
        <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th>Name</th>
                <th>Mark</th>
                <th>Course</th>
                <th>Student</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($works as $work)
            <tr>
                <td>{{ $work->name }}</td>
                <td>{{ $work->mark }}</td>
                <td>{{ $work->course_offering->name }}</td>
                <td>{{ $work->student->name.' '.$work->student->surname }}</td>
                <td><a class="btn btn-info btn-sm" href="/works/{{$work->id}}">View</a></td>
            </tr>
        @endforeach
            </tbody>
        </table>
        </div>

        @else
        {{-- No data --}}
        <div class="row py-5">
            <div class="col text-center">
                <h1 class="display-5 mb-5">Looks like there are no works yet</h1>
                <a class="btn btn-success btn-lg" href="/works/create">Create the First Work</a>
            </div>
        </div>
        @endif
        </div>
    </div>

@endsection
