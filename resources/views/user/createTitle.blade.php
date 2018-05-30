@extends('layouts/main')

@section('title')
   Titles Maintenance
@endsection

@section('content')
<div class="container">
{{-- @php
    dd('hola');
@endphp --}}
@if (!empty($success))
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ $success }}
    </div>
@endif

<h2 class="move-up move-right">Titles Maintenance
    {{-- <a href="{{ url('user/titles') }}" class="btn btn-primary btn-md pull-right move-left move-up">&nbsp;&nbsp;&nbsp;&nbsp;Return Home&nbsp;&nbsp;&nbsp;&nbsp;</a> --}}


<a href="{{ url("/") }}" class="btn btn-primary pull-right move-up" role="button">&nbsp;&nbsp;&nbsp;Return Home&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-home"></span></a>
</h2>
<div class="row body-background">

<div class="col-md-10 col-md-offset-1">
{!! Form::open(['data-parsley-validate' => '', 'route' => 'storeTitle', 'method' => 'post']) !!}     <br>  
</div>
<br>

<div class="col-md-10 col-md-offset-1">
    <h3 class="move-up text-center">Create a New Title</h3>

    {{-- <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Title ID:</span>
        {{ Form::text('title_id', $title_id, ['class' => 'form-control', 'placeholder' => 'Title ID', 'disabled' => '']) }}       
    </div> --}}

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true"  data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Title Type:</span>
        {{-- {{ Form::text('title_type', $title_type, ['class' => 'form-control', 'placeholder' => 'Title Type', 'required' => '', 'data-parsley-type' => 'required']) }} --}}
        {!! Form::select('title_type', [
            'Staff'         => 'Staff',
            'Associate'     => 'Associate',
            'Partner'       => 'Partner'],
            null, [
            'class'         => 'form-control', 
            'placeholder'   => 'Title Type', 
            'required'      => '', 
            'data-parsley-type' => 'required']
        ) !!}

    </div>

    <div class="input-group move-down">
        <span class="input-group-addon"><i class="fa fa-address-book fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Title Description:</span>
        {{ Form::text('title_title', null, ['class' => 'form-control', 'placeholder' => 'Title Description']) }}
    </div>
    <br>
{{ Form::hidden('title_id', $title->id) }}
{{ Form::submit('Create Title', ['class' => 'col-sm-5 btn btn-success move-down pull-left']) }}
 {{-- <br> --}}
{!! Form::close() !!}

<a href="{{ route('titles') }}" class="col-sm-5 btn btn-danger move-down move-right pull-right" style="display:inline-block" role="button"> Cancel Create Title </a>
</div>
</div>
@endsection

