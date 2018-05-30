@extends('layouts/main')

@section('title')
   Register
@endsection

@section('content')
<div class="container">

<h2 class="move-up">Login as a different User</h2>
<div class="row body-background">
    <div class="row">
<br>

<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default move-down">
    <div class="panel-heading text-center">Login as a different User <br>i.e. Login as the new user you just created to complete the new users profile</div>
    <div class="panel-body">

        {{-- <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }} --}}

        {!! Form::open(['data-parsley-validate' => '', 'route' => 'login', 'method' => 'post']) !!}

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Username:</span>
            {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required' => '', 'unique' => '']) }}
        </div>

         <div class="input-group move-down">
        {{-- <label for="inputPassword" class="sr-only">Password</label> --}}
        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Password:</span>
        {!! Form::password('password', [
            'class'                         => 'form-control',
            'placeholder'                   => 'Password',
            'required',
            'id'                            => 'inputPassword',
            'data-parsley-required-message' => 'Password is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-minlength'        => '6',
            'data-parsley-maxlength'        => '20'
        ]) !!}
        </div>

        <br>

    {{ Form::submit('Login', ['class' => 'col-md-5 btn btn-success pull-left move-down']) }}
         {{-- <br> --}}
    {!! Form::close() !!}

    <a href="/" class="col-md-5 btn btn-danger pull-right move-down" role="button"> Cancel Login and Return Home </a></div>
            </div>
        </div>
    </div>
</div>
@endsection
    
{{-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a> --}}



{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
{{-- <div class="container"> --}}
    {{-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- @endsection --}}
