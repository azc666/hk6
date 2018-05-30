@extends('layouts/main')

@section('title')
   Create New User
@endsection

@section('content')
<div class="container">

<h2 class="move-up">Create a New User</h2>
<div class="row body-background">
    <div class="row">
<br>
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default move-down">
    <div class="panel-heading text-center">Create a New User <br>You will be redirected to "Login" to complete/modify the user's "My Profile"<br><i>(Please note: You cannot modify the Username nor HK Location # once created.)</i></div>
    <div class="panel-body">

        {{-- <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }} --}}

        {!! Form::open(['data-parsley-validate' => '', 'route' => 'register', 'method' => 'post']) !!}

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;HK Location #:</span>
            {{ Form::text('loc_num', null, ['class' => 'form-control', 'placeholder' => 'i.e. 90', 'required' => '', 'unique' => '']) }}
        </div>

        <div class="input-group move-down">
            <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;HK Location Name:</span>
            {{ Form::text('loc_name', null, ['class' => 'form-control', 'placeholder' => 'i.e. Tampa', 'required' => '', 'unique' => '']) }}
        </div>

        <div class="input-group move-down">
            <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Username:</span>
            {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Typically HK{username} i.e. HK90', 'required' => '', 'unique' => '']) }}
        </div>

        <div class="input-group move-down">
            <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Admin Email:</span>
            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Admin Email', 'required' => '']) }}
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

        <div class="input-group move-down">
        {{-- <label for="inputPasswordConfirm" class="sr-only has-warning">Confirm Password</label> --}}
        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Password Confirmation:</span>
        {!! Form::password('password_confirm', [
            'class'                         => 'form-control',
            'placeholder'                   => 'Password confirmation',
            'required',
            'id'                            => 'password_confirm',
            'data-parsley-required-message' => 'Password confirmation is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-equalto'          => '#inputPassword',
            'data-parsley-equalto-message'  => 'Password Confirmation is not the same as Password',
        ]) !!}
        </div>

    <br>
    {{ Form::submit('Create New User', ['class' => 'col-md-5 btn btn-success pull-left move-down']) }}
 {{-- <br> --}}
{!! Form::close() !!}

{{-- &nbsp; --}}
<a href="/" class="col-md-5 btn btn-danger pull-right move-down" role="button"> Reject Changes and Return Home </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
