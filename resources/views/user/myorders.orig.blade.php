<!DOCTYPE html>
@extends('layouts/main')

@section('title')
   My Orders
@endsection

@section('content')

<div class="container">
    <div class="row">
      <h2 class="pull-left move-up"> My Orders </h2>
      <a href="{{ url("/") }}" class="btn btn-primary pull-right move-up" role="button">&nbsp;&nbsp;&nbsp;Return Home&nbsp;&nbsp;&nbsp;</a>
    </div>

    <div class="row body-background">   
 <div class="container">

<br>
<table class="table table-striped table-bordered">
    
    <thead>
      <tr>
        <th>Date</th>
        <th>Location</th>
        <th>Location Name</th>
        <th>Confirmation</th>
      </tr>
    </thead>
    
    
    <tbody>
        @if (!$ordersList->count())
            <h3 class="text-center move-up">There are no orders to display</h1> <br>
        @endif
        
        @foreach ($ordersList as $order)
        <tr>
        {!! Form::open(['route' => 'showConfirmedOrder', 'method' => 'POST']) !!}
        {!! Form::hidden('confirm', $order->confirmation) !!}

         <td>{{ $order->created_at->format('m/d/Y h:i A') }}</td>
         <td>{!! $order->user->loc_num !!}</td>
         <td>{{ $order->name }}</td>
         <td>{!! Form::submit($order->confirmation, ['class' => 'btn btn-default move-up']) !!}</td>

         {!! Form::close() !!}
        </tr>
        @endforeach
    </tbody>

  </table>
{{-- {{$sort}} --}}
  {{-- <p>There are {{ $results->count() }}orders.</p> --}}
  {{ $ordersList->links() }}




{{--     @foreach ($orders as $order)
        <br>
        {!! Form::open(['route' => 'showConfirmedOrder', 'method' => 'POST', 'class' => 'form-horizontal', 'data-parsley-validate' => '']) !!}
        {!! Form::hidden('confirm', $order->confirmation) !!}

         name: {{ $order->name }} <br>
         conf: {!! Form::submit($order->confirmation, ['class' => 'btn btn-link']) !!}<br>
         date: {{ $order->created_at }} <br>

         {!! Form::close() !!}
         <br><hr>
    @endforeach --}}

    </div>  
    </div>
    
{{-- </div> --}}
@endsection