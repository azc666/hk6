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
<br>

    <div class="container">
    <table id="myorders-table" class="table table-striped table-bordered" cellspacing="0" width="100%">

    <thead>
      <tr>
        <th>Date</th>
        <th>Location</th>
        <th>Location Name</th>
        <th>Confirmation</th>
        <th>Cart</th>
      </tr>
    </thead>

    <tbody>
        @if (!$orders->count())
            <h3 class="text-center move-up">There are no orders to display</h1> <br>
        @endif
        
        @foreach ($orders as $order)
            <tr>
            {!! Form::open(['route' => 'showConfirmedOrder', 'method' => 'POST']) !!}
            {!! Form::hidden('confirm', $order->confirmation) !!}
            {{-- {!! Form::hidden('cart', $order->cart) !!} --}}

             <td>{{ $order->created_at->format('m/d/Y h:i A') }}</td>
             <td>{{ $order->user->loc_num }}</td>
             <td>{{ $order->name }}</td>
             {{-- <td>{{ $order->confirmation }}</td> --}}
             
             <td>{!! Form::submit($order->confirmation, ['class' => 'btn btn-default move-up']) !!}</td>
            <td>{{ $order->cart }}</td>
             {!! Form::close() !!}
            </tr>
        @endforeach
    </tbody>
    </table>
    @endsection
