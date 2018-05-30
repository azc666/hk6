@extends('layouts/main')

@section('title')
  Order Confirmation
@endsection

@section('content')

    <div class="container">

    {{-- <div class="container"> --}}
        <div class="row">
            <h2 class="pull-left move-up">Order Confirmation: {{ $confirmation }} &nbsp;&nbsp;&nbsp; </h2>
              
            <a href="{{ url("/") }}" class="move-up btn btn-primary pull-right move-up" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Return Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <h3 class="move-up"> &nbsp;
                    <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> &nbsp;&nbsp;&nbsp;Print the Confirmation&nbsp;&nbsp;&nbsp;</button>
                </h3>
            </div>
        </div>

        {!! $cartOrder !!}    {{-- from CartOrderController --}}

</div> <!-- end container -->

<div class="container">

@endsection
    <script>
        function myFunction() {
        window.print();
        }
    </script>




