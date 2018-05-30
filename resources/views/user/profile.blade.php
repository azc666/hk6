<!DOCTYPE html>
@extends('layouts/main')

@section('title')
   My Profile
@endsection

{{-- <style>
.input-group-addon {
    min-width:225px;
    text-align:right;
}
</style> --}}

@section('content')
<div class="container">

@if (!empty($success))
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ $success }}
    </div>
@endif

<h2 class="move-up move-right">My Profile
    <a href="{{ url('/') }}" class="btn btn-primary btn-md pull-right move-left move-up">&nbsp;&nbsp;&nbsp;&nbsp;Return Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
</h2>

<div class="row body-background">
{{-- <div class="panel panel-primary space-above"> --}}
{{-- <div class="panel-body"> --}}

<div class="col-md-10 col-md-offset-1">
{!! Form::open(['data-parsley-validate' => '', 'route' => 'editProfile', 'method' => 'post']) !!}     <br>  
    <h3 class="move-up text-center">Username: BC{{ $user->loc_num }}</h3>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-home fa-lg" aria-hidden="true" data-toggle="tooltip" title="Enter your full legal name / dba"></i>&nbsp;&nbsp;Location Name:</span>
            {{ Form::text('loc_name', $user->loc_name, ['class' => 'form-control', 'placeholder' => 'Location Name', 'required' => '',]) }}  
        </div>
    </div>

</div>
<br>

<div class="col-md-10 col-md-offset-1">
    <h3 class="move-up text-center">Admin Contact</h3>

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Admin Contact Name:</span>
        {{ Form::text('contact_a', $user->contact_a, ['class' => 'form-control', 'placeholder' => 'Admin Contact Name', 'required' => '']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-envelope-o fa-lg" aria-hidden="true"  data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Admin Contact Email:</span>
        {{ Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Admin Contact Email', 'required' => '', 'data-parsley-type' => 'email']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-phone fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Admin Contact Phone:</span>
        {{ Form::text('phone_a', $user->phone_a, ['class' => 'form-control', 'placeholder' => 'Admin Contact Phone']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-fax fa-lg" aria-hidden="true"></i>
&nbsp;&nbsp;Admin Contact Fax:</span>
        {{ Form::text('fax_a', $user->fax_a, ['class' => 'form-control', 'placeholder' => 'Admin Contact Fax']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-mobile fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Admin Contact Cell:</span>
        {{ Form::text('cell_a', $user->cell_a, ['class' => 'form-control', 'placeholder' => 'Admin Contact Cell']) }}
    </div>

<br>
</div>

<div class="col-md-10 col-md-offset-1">
    <h3 class="move-up text-center">Billing Contact</h3>

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Billing Contact Name:</span>
        {{ Form::text('contact_b', $user->contact_b, ['class' => 'form-control', 'placeholder' => 'Billing Contact Name', 'required' => '']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-envelope-o fa-lg" aria-hidden="true"  data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Billing Contact Email:</span>
        {{ Form::email('email_b', $user->email_b, ['class' => 'form-control', 'placeholder' => 'Billing Contact Email', 'required' => '', 'data-parsley-type' => 'email']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-phone fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Billing Contact Phone:</span>
        {{ Form::text('phone_b', $user->phone_b, ['class' => 'form-control', 'placeholder' => 'Billing Contact Phone']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-fax fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Billing Contact Fax:</span>
        {{ Form::text('fax_b', $user->fax_b, ['class' => 'form-control', 'placeholder' => 'Billing Contact Fax']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-mobile fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Billing Contact Cell:</span>
        {{ Form::text('cell_b', $user->cell_b, ['class' => 'form-control', 'placeholder' => 'Billing Contact Cell']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-home fa-lg" aria-hidden="true" data-toggle="tooltip" title="Enter your address"></i>&nbsp;&nbsp;Location Address 1:</span>
        {{ Form::text('loc_address1', $user->loc_address1, ['class' => 'form-control', 'placeholder' => 'Location Address 1', 'required' => '',]) }}  
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-home fa-lg" aria-hidden="true" data-toggle="tooltip" title="Enter a second address line"></i>&nbsp;&nbsp;Location Address 2:</span>
        {{ Form::text('loc_address2', $user->loc_address2 ? $user->loc_address2 : '', ['class' => 'form-control', 'placeholder' => 'Location Address 2']) }}  
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-home fa-lg" aria-hidden="true" data-toggle="tooltip" title="Enter your City"></i>&nbsp;&nbsp;Location City:</span>
        {{ Form::text('loc_city', $user->loc_city, ['class' => 'form-control', 'placeholder' => 'Location City', 'required' => '',]) }}  
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-home fa-lg" aria-hidden="true" data-toggle="tooltip" title="Enter your State"></i>&nbsp;&nbsp;Location State:</span>
        {{ Form::text('loc_state', $user->loc_state, ['class' => 'form-control', 'placeholder' => 'Location State', 'required' => '',]) }}  
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-home fa-lg" aria-hidden="true" data-toggle="tooltip" title="Enter your Zip"></i>&nbsp;&nbsp;Location Zip:</span>
        {{ Form::text('loc_zip', $user->loc_zip, ['class' => 'form-control', 'placeholder' => 'Location Zip', 'required' => '',]) }}  
    </div>

<br><br>
</div>
<div class="col-md-10 col-md-offset-1">
    <h3 class="move-up text-center">Shipping Contact</h3>

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Shipping Contact Name:</span>
        {{ Form::text('contact_s', $user->contact_s, ['class' => 'form-control', 'placeholder' => 'Shipping Contact Name', 'required' => '']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-envelope-o fa-lg" aria-hidden="true"  data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Shipping Contact Email:</span>
        {{ Form::email('email_s', $user->email_s, ['class' => 'form-control', 'placeholder' => 'Shipping Contact Email', 'required' => '', 'data-parsley-type' => 'email']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-phone fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Shipping Contact Phone:</span>
        {{ Form::text('phone_s', $user->phone_s, ['class' => 'form-control', 'placeholder' => 'Shipping Contact Phone']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-fax fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Shipping Contact Fax:</span>
        {{ Form::text('fax_s', $user->fax_s, ['class' => 'form-control', 'placeholder' => 'Shipping Contact Fax']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-mobile fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Shipping Contact Cell:</span>
        {{ Form::text('cell_s', $user->cell_s, ['class' => 'form-control', 'placeholder' => 'Shipping Contact Cell']) }}
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-home fa-lg" aria-hidden="true" data-toggle="tooltip" title="Enter your address"></i>&nbsp;&nbsp;Shipping Address 1:</span>
        {{ Form::text('address1_s', $user->address1_s, ['class' => 'form-control', 'placeholder' => 'Location Address1', 'required' => '',]) }}  
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-home fa-lg" aria-hidden="true" data-toggle="tooltip" title="Enter a second address line"></i>&nbsp;&nbsp;Shipping Address 2:</span>
        {{ Form::text('address2_s', $user->address2_s, ['class' => 'form-control', 'placeholder' => 'Location Address2']) }}  
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-home fa-lg" aria-hidden="true" data-toggle="tooltip" title="Enter your City"></i>&nbsp;&nbsp;Shipping City:</span>
        {{ Form::text('city_s', $user->city_s, ['class' => 'form-control', 'placeholder' => 'Location City', 'required' => '',]) }}  
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-home fa-lg" aria-hidden="true" data-toggle="tooltip" title="Enter your State"></i>&nbsp;&nbsp;Shipping State:</span>
        {{ Form::text('state_s', $user->state_s, ['class' => 'form-control', 'placeholder' => 'Location State', 'required' => '',]) }}  
    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-home fa-lg" aria-hidden="true" data-toggle="tooltip" title="Enter your Zip"></i>&nbsp;&nbsp;Shipping Zip:</span>
        {{ Form::text('zip_s', $user->zip_s, ['class' => 'form-control', 'placeholder' => 'Location Zip', 'required' => '',]) }}  
    </div>

<br><br>
{{-- </div> --}}
       
  {{-- </form> --}}

        {{-- {!! Form::open(['data-parsley-validate' => '', 'route' => 'login']) !!}
            <div class="col-md-8 offset-col-md-2">
            <div class="form-group">
                {{ Form::label('', '') }}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required' => '',
                ]) }}  
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('', '') }}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                {{ Form::password('password', ['class' => 'form-control','placeholder' => 'Password', 'required' => '', 'minlength' => '6']) }}  
                </div>
            </div>
            </div> --}}
            {{-- <div class="form-group">
                <div class="input-group">
                    {{ Form::checkbox('remember') }}&nbsp;&nbsp;{{ Form::label('remember', "Remember Me") }}
                </div>
            </div> --}}

            {{-- {{ Form::submit('Login', ['class' => 'btn btn-primary btn-block']) }}
        {!! Form::close() !!}

        <p> <a href="{{ url('password/reset') }}">Forgot Password?</a> </p>
 --}}
    
   
    {{-- </div> --}}
{{ Form::submit('Update Profile', ['class' => 'col-md-5 btn btn-success pull-left move-up']) }}
 {{-- <br> --}}
{!! Form::close() !!}

{{-- &nbsp; --}}
<a href="/" class="col-md-5 btn btn-danger pull-right move-up" role="button"> Reject Changes and Return Home </a>
</div>
 </div>
 {{-- </div> --}}
@endsection
{{-- </div> --}}
