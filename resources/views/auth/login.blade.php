@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
    <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
        <h2>Login</h2>
        {!! Form::open(['url' => 'login']) !!}


          <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) }}
          </div>
          <div class="form-group">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => '●●●●●●●●●']) }}
          </div>

          <div class="row">
              <div class="col">
                  {{ Form::submit('Login', ['class' => 'btn btn-success btn-block']) }}
              </div>
          </div>

        {!! Form::close() !!}
    </div>
    </div>
</div>
<div class="row py-2">
    <div class="col text-center">
        <a class="text-secondary" href="/register">Not registered?</a>
    </div>
</div>
</div>
@endsection
