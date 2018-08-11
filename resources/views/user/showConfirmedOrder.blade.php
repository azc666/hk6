@extends('layouts/main')

@section('title')
  Order {{ $showOrder }}
@endsection

@section('content')

<div class="container">
    <div class="row">
      <h2 class="pull-left move-up"> Order Confirmation: {{ $showOrder }} </h2>
      <a href="{{ route("myorders")}}" class="btn btn-primary pull-right move-up" role="button">"My Orders" Page</a>
      <a href="{{ route('editcartReorder', Session::get('showOrder')) }}" class="btn btn-primary pull-right move-up move-left" role="button">Repeat This Order</a>
      <button class="btn btn-primary hidden-print pull-right move-left" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
    </div>
</div>
@php
  // dd($confirmEmail);
@endphp

{!! $confirmEmail->cart !!}

@endsection

{{-- <script>
    function myFunction() {
        window.print();
    }
</script> --}}