@extends('layouts.app')

@section('content')

    {{-- Works --}}
    <div class="row">
        <div class="col">
        @if(count($works) > 0)
        <div class="card card-body bg-light mt-5">
        {{-- header row --}}
        <div class="row">
            <div class="col-6">
            <h2 class="mb-3">Works</h2>
            </div>
        </div>
        <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th>Course</th>
                <th>Work</th>
                <th>Mark</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($works as $work)
            <tr class="{{$work->mark >= 5 ? 'text-success' : 'text-danger'}}">
                <td>{{$work->course_offering->name}}</td>
                <td>{{$work->name}}</td>
                <td>{{round($work->mark, 2)}}</td>
            </tr>
        @endforeach
            </tbody>
        </table>
        </div>
        </div>
        @endif
    </div>

    {{-- Exams --}}
    <div class="row">
        <div class="col">
        @if(count($exams) > 0)
        <div class="card card-body bg-light mt-5">
        {{-- header row --}}
        <div class="row">
            <div class="col-6">
            <h2 class="mb-3">Exams</h2>
            </div>
        </div>
        <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th>Course</th>
                <th>Work</th>
                <th>Mark</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($exams as $exam)
            <tr class="{{$exam->mark >= 5 ? 'text-success' : 'text-danger'}}">
                <td>{{$exam->course_offering->name}}</td>
                <td>{{$exam->name}}</td>
                <td>{{round($exam->mark, 2)}}</td>
            </tr>
        @endforeach
            </tbody>
        </table>
        </div>
        </div>
        @endif
    </div>

    {{-- Exams --}}
    <div class="row">
        <div class="col">
        @if(count($marks_summary) > 0)
        <div class="card card-body bg-light mt-5">
        {{-- header row --}}
        <div class="row">
            <div class="col-6">
            <h2 class="mb-3">Summary</h2>
            </div>
        </div>
        <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th>Course</th>
                <th>Works Average</th>
                <th>Works Weigth</th>
                <th>Exams Average</th>
                <th>Exams Weight</th>
                <th>Final Mark</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($marks_summary as $mark)
            <tr class="{{$mark['final_mark'] >= 5 ? 'text-success' : 'text-danger'}}">
                <td>{{$mark['course_offering']}}</td>
                <td>{{round($mark['avg_works'], 2)}}</td>
                <td>{{$mark['works_value']}}%</td>
                <td>{{round($mark['avg_exams'], 2)}}</td>
                <td>{{$mark['exams_value']}}%</td>
                <td>{{round($mark['final_mark'], 2)}}</td>
            </tr>
        @endforeach
            </tbody>
        </table>
        </div>
        </div>
        @endif
    </div>
@endsection
