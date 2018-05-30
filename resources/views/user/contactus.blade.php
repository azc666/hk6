<!DOCTYPE html>

@extends('layouts/main')

@section('title')
   Contact Us
@endsection

@section('content')
    {{-- @if (Auth::check())
    hola
    {{exit()}} --}}
        {{-- <script type="text/javascript">
            window.location = "{ url('/login') }";//here double curly bracket
        </script>
    @else  --}}
{{-- @endsection

@section('content') --}}

    <div class="container">

    @if (!empty($success))
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $success }}
        </div>
    @endif

    <h2 class="move-up move-right">Contact HK Order Portal Support
        <a href="{{ url('/') }}" class="btn btn-primary btn-md pull-right move-left move-up">&nbsp;&nbsp;&nbsp;&nbsp;Return Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
    </h2>

    {{-- <h2 class="move-up">Contact Support @ Graphics + Design</h2> --}}
    <div class="row body-background">
        <div class="row">
        <br>
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default move-down">

    @if (Auth::user())
        <div class="panel-heading text-center">Need some help with the portal? Have a question about your order? We are here to help!<br>You can contact us by phone, fax, or email, or simply submit the support form below. <br>Phone: 813-254-9444 • Fax: 813-254-9445 • Email: support@hkorderportal.com</div>
    @else
        <div class="panel-heading text-center"> In order to enhance email user privacy and security, passwords will be reset by the Order Portal Admin Only. <br> Please send this secure request stating that you need your password reset, or your username recovered. <br>For immediate help, you may contact us by phone, fax, or email. <br><strong>Phone: 813-254-9444 • Fax: 813-254-9445 • Email: support@hkorderportal.com</strong></div>
    @endif
        
    <div class="panel-body">
        <div class="text-center"> Edit fields as appropriate. All fields are required.
        </div>
@if (Auth::check())
        
    {!! Form::open(['data-parsley-validate' => '', 'route' => 'sendContactus', 'method' => 'post']) !!}

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;HK Location #:</span>
        {{ Form::text('loc_num', Auth::user()->loc_num, ['class' => 'form-control', 'placeholder' => 'i.e. 20', 'required' => '', 'unique' => '']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;HK Location Name:</span>
        {{ Form::text('loc_name', Auth::user()->loc_name, ['class' => 'form-control', 'placeholder' => 'i.e. Tampa', 'required' => '', 'unique' => '']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Your Name:</span>
        {{ Form::text('contactus_name', Auth::user()->contact_a, ['class' => 'form-control', 'placeholder' => 'Your Name', 'required' => '']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Your Reply Email:</span>
        {{ Form::email('contactus_email', Auth::user()->email, ['class' => 'form-control', 'placeholder' => 'Your Reply Email', 'required' => '']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-question-circle fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Support Subject:</span>
        <div class="checkbox-inline form-control">
            &nbsp;
            {{ Form::checkbox('portalSupport', 1, true) }}Portal Support
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{ Form::checkbox('productInfo') }}Product Info
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{ Form::checkbox('other') }}Other
        </div>
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Your Message:</span>     
        {{ Form::textarea('contactMessage', null, ['class' => 'form-control', 'placeholder' => 'Enter your message here (max 250 characters).', 'required' => '', 'maxlength' => '250', 'style' => 'min-width: 100%', 'rows' => '5']) }}
    </div>

    <br>
    {{ Form::submit('Submit your Email to Portal Support', ['class' => 'col-md-5 btn btn-success pull-left move-down']) }}
     {{-- <br> --}}
    {!! Form::close() !!}

@else 

    {!! Form::open(['data-parsley-validate' => '', 'route' => 'sendContactus', 'method' => 'post']) !!}

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;HK Location #:</span>
        {{ Form::text('loc_num', null, ['class' => 'form-control', 'placeholder' => 'i.e. 20', 'required' => '', 'unique' => '']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;HK Location Name:</span>
        {{ Form::text('loc_name', null, ['class' => 'form-control', 'placeholder' => 'i.e. Tampa', 'required' => '', 'unique' => '']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Your Name:</span>
        {{ Form::text('contactus_name', null, ['class' => 'form-control', 'placeholder' => 'Your Name', 'required' => '']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Your Email:</span>
        {{ Form::email('contactus_email', null, ['class' => 'form-control', 'placeholder' => 'Your Email', 'required' => '']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-question-circle fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Support Subject:</span>
        <div class="checkbox-inline form-control">
            &nbsp;
            {{ Form::checkbox('portalSupport', 1, true) }}Portal Support
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{ Form::checkbox('productInfo') }}Product Info
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{ Form::checkbox('other') }}Other
        </div>
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Your Message:</span>     
        {{ Form::textarea('contactMessage', null, ['class' => 'form-control', 'placeholder' => 'Enter your message here (max 250 characters).', 'required' => '', 'maxlength' => '250', 'style' => 'min-width: 100%', 'rows' => '5']) }}
    </div>

    <br>
    {{ Form::submit('Submit your Email to Portal Support', ['class' => 'col-md-5 btn btn-success pull-left move-down']) }}
     {{-- <br> --}}
    {!! Form::close() !!}    
@endif
    {{-- &nbsp; --}}
    <a href="/" class="col-md-5 btn btn-danger pull-right move-down" role="button"> Reject Changes and Return Home </a>

    </div>
                </div>
            </div>
        </div>
    </div>

       {{-- @endif --}}

@endsection