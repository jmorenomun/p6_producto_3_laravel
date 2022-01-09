@extends('layouts.app')

@section('content')

    <div class="row px-3">
        <div class="col">
        @if(count($exams) > 0)
        <div class="card card-body bg-light mt-5">

        <div class="row">
            <div class="col-6">
            <h2 class="mb-3">Exams</h2>
            </div>
            <div class="col-6 text-right">
            <a class="btn btn-success btn-md" href="/enrollments/create">Add New</a>
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
        @foreach ($exams as $exam)
            <tr>
                <td>{{ $exam->name }}</td>
                <td>{{ $exam->mark }}</td>
                <td>{{ $exam->course_offering->name }}</td>
                <td>{{ $exam->student->name.' '.$exam->student->surname }}</td>
                <td><a class="btn btn-info btn-sm" href="/exams/{{$exam->id}}">View</a></td>
            </tr>
        @endforeach
            </tbody>
        </table>
        </div>

        @else
        {{-- No data --}}
        <div class="row py-5">
            <div class="col text-center">
                <h1 class="display-5 mb-5">Looks like there are no exams yet</h1>
                <a class="btn btn-success btn-lg" href="/exams/create">Create the First Exam</a>
            </div>
        </div>
        @endif
        </div>
    </div>

@endsection
