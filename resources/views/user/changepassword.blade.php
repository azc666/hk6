@extends('layouts/main')

@section('title')
   Change Password
@endsection

@section('content')
<div class="container">

<h2 class="move-up">Change Your Password</h2>
<div class="row body-background">
    <div class="row">
<br>

<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default move-down">
    <div class="panel-heading text-center">Change your password</div>
    <div class="panel-body">

    {!! Form::open(['data-parsley-validate' => '', 'route' => 'changePassword', 'method' => 'post']) !!}

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;New Password:</span>
        {!! Form::password('password', [
            'class'                         => 'form-control',
            'placeholder'                   => 'New Password',
            'required',
            'id'                            => 'inputPassword',
            'data-parsley-required-message' => 'Password is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-minlength'        => '6',
            'data-parsley-maxlength'        => '20'
        ]) !!}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;New Password Confirmation:</span>
        {!! Form::password('password_confirm', [
            'class'                         => 'form-control',
            'placeholder'                   => 'New Password confirmation',
            'required',
            'id'                            => 'password_confirm',
            'data-parsley-required-message' => 'Password confirmation is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-equalto'          => '#inputPassword',
            'data-parsley-equalto-message'  => 'Password Confirmation is not the same as Password',
        ]) !!}
    </div>

    <br>

    {{ Form::submit('Change Password', ['class' => 'col-md-5 btn btn-success pull-left move-down']) }}
         {{-- <br> --}}
    {!! Form::close() !!}

    <a href="/" class="col-md-5 btn btn-danger pull-right move-down" role="button"> Cancel </a></div>
            </div>
        </div>
    </div>
</div>
@endsection