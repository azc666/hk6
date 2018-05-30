<!DOCTYPE html>
<html>
<head>
    <title>
        My Orders
    </title>
    <br>
    @include('partials/_head')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
</head>

<body>
   
    <div class="container">
        <div class="row">
            @include('partials/_navbar')
        </div>
    </div>

    <div class="container">
    <div class="row">
      <h2 class="pull-left move-up"> My Orders </h2>
      <a href="{{ url("/") }}" class="btn btn-primary pull-right move-up" role="button">&nbsp;&nbsp;&nbsp;Return Home&nbsp;&nbsp;&nbsp;</a>
    </div>

    <div class="row body-background">   
 <div class="container">

<br>

    {{-- <table id="example" class="display" cellspacing="0" width="100%"> --}}
    {{-- <table id="example" class="table table-striped table-bordered"> --}}
    <table id="myorders" class="table table-striped table-bordered" cellspacing="0" width="100%">

    <thead>
      <tr>
        <th>Date</th>
        <th>Location</th>
        <th>Location Name</th>
        <th>Confirmation</th>
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

             <td>{{ $order->created_at->format('m/d/Y h:i A') }}</td>
             <td>{!! $order->user->loc_num !!}</td>
             <td>{{ $order->name }}</td>
             <td>{!! Form::submit($order->confirmation, ['class' => 'btn btn-default move-up']) !!}</td>

             {!! Form::close() !!}
            </tr>
        @endforeach
    </tbody>
    </table>

    {{-- <script src="//code.jquery.com/jquery-1.12.4.js" type="text/javascript" charset="utf-8" async defer></script> --}}

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8" async defer></script>

    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
    
    <script>
      $(document).ready(function(){
    $('#myorders').DataTable();
});
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

   @include('partials/_footer')

</body>
</html>
