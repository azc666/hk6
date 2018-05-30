@extends('layouts/main')

@section('title')
   Reset Your Password
@endsection

@section('content')
<div class="container">

<h2 class="move-up">Reset Your Password</h2>
<div class="row body-background">
    <div class="row">
    <br>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default move-down">
                <div class="panel-heading text-center">
                    <strong>Reset Your Password</strong>
                    <br>Enter the username from the location requesting the password reset <i>(possibly HK something)</i>, and then enter and confirm your new password. You will automatically be logged in. Please remember your updated password.
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                <br>
                {!! Form::open(['data-parsley-validate' => '', 'route' => 'password.request', 'method' => 'post']) !!} 

                {!! Form::hidden('token', $token) !!}

                <div class="input-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Username:</span>
                    {{ Form::text('username', null, ['id' => 'username', 'class' => 'form-control', 'placeholder' => 'Username', 'value' => $username or old('username'), 'required' => '', 'unique' => '', 'autofocus' => '']) }}
                </div> 
                <br>   

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif

                <div class="move-down input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;New Password:</span>
                    {{ Form::password('password', [
                        'id' => 'password', 
                        'class' => 'form-control', 
                        'placeholder' => 'New Password', 
                        'required' => '']) }}
                </div> 
                <br>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                <div class="move-down input-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">                           
                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Password Confirm:</span>
                    {{ Form::password('password_confirmation', [
                        'id' => 'password-confirm', 
                        'class' => 'form-control', 
                        'placeholder' => 'New Password Confirm', 
                        'required' => '']) }}
                </div> 
                <br>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif

                {{ Form::submit('Reset Password', ['class' => 'col-md-5 btn btn-primary btn-block move-down']) }}
                <br>
                {!! Form::close() !!}  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
