<!DOCTYPE html>

@extends('layouts/main')

@section('title')
   Titles Listing
@endsection

@section('content')

<div class="container">
  <div class="row">

 @if (session('status'))
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status') }}
    </div>
@endif     
    <h2 class="pull-left move-up"> Titles Listing </h2>

<div class="side-by-side">
<a href="{{ url("/") }}" class="btn btn-primary pull-right move-up" role="button">&nbsp;&nbsp;&nbsp;Return Home&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-home"></span></a>

{{ Form::open(['route' => 'createTitle', 'method' => 'post']) }}
              {{-- {{ Form::hidden('title_id', $title->id) }}
              {{ Form::hidden('title_type', $title->type) }}
              {{ Form::hidden('title_title', $title->title) }} --}}
             <button class="btn btn-primary move-up pull-right" style="margin-right:10px;" type="submit">Add a Title &nbsp;
  <span class="glyphicon glyphicon-plus"></span> 
</button>

              
{!! Form::close() !!}


{{-- <button class="btn btn-primary move-up pull-right" style="margin-right:10px;" type="submit" id="add">Add a Title &nbsp;
  <span class="glyphicon glyphicon-plus"></span> 
</button> --}}
 </div>
  </div>
{{-- </div> --}}
     
 {{-- <div class="container"> --}}
<div class="row body-background">
<br>

    {{-- <table id="example" class="display" cellspacing="0" width="100%"> --}}
    {{-- <table id="example" class="table table-striped table-bordered"> --}}
    <div class="container">
    <table id="mytitles-table" class="table table-striped table-bordered" cellspacing="0" width="100%">

    <thead>
      <tr>
        <th>Title ID</th>
        <th>Title Type</th>
        <th>Title Description</th>
        <th>Updated</th>
        <th style="text-align: center" width="20%">Actions</th>
      </tr>
    </thead>

    <tbody>
        @if (!$titles->count())
            <h3 class="text-center move-up">There are no titles to display</h1> <br>
        @endif
        
        @foreach ($titles as $title)
          <tr>
           
           <td>{{ $title->id }}</td>
           <td>{{ $title->type }}</td>
           <td>{{ $title->title }}</td>
           {{-- <td>{{ $title->updated_at }}</td> --}}
           <td>{{ Carbon\Carbon::parse($title->updated_at)->format('m/d/Y') }}
            <td>
            {{-- @php
          dd('hola');
        @endphp --}}  

              {{ Form::open(['route' => 'deleteTitle', 'method' => 'delete', 'onsubmit' => 'return ConfirmDelete()']) }}
              {{ Form::hidden('title_id', $title->id) }}
              {{ Form::hidden('title_type', $title->type) }}
              {{ Form::hidden('title_title', $title->title) }}
              <button type="submit" class="btn btn-danger pull-right">
                <span class="glyphicon glyphicon-trash"></span> Delete &nbsp;
              </button>
              {{-- {{ Form::submit('Delete', ['class' => 'btn btn-danger pull-right']) }} --}}
              {!! Form::close() !!}

              {{ Form::open(['route' => 'editTitle', 'method' => 'post']) }}
              {{ Form::hidden('title_id', $title->id) }}
              {{ Form::hidden('title_type', $title->type) }}
              {{ Form::hidden('title_title', $title->title) }}
              <button type="submit" class="btn btn-info">
                <span class="glyphicon glyphicon-edit"></span> Edit &nbsp;
              </button>
              {{-- {{ Form::submit('Edit', ['class' => 'btn btn-info pull-right', 'style' => 'margin-right:10px']) }} --}}
              {!! Form::close() !!}
              
            </td>
          </tr>
        @endforeach

    </tbody>
    </table>

@endsection

