<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/product.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-md-12">
        <br>
        {{-- <img src="https://hkhorderportal.com/assets/HKheader2.png" style="max-width:500px;" alt="HK Logo" class="img-responsive move-right move-down"><br> --}}
        {{ Html::image('assets/HKheader2.png', 'HK Logo', [
                    'style' => 'max-width:500px',
                    'class' => 'img-responsive move-right move-down'
                ]) }}
        <h3 class="move-up">Production Order Details</h3>
        <strong><p class="move-up">HK{{ Auth::user()->loc_num }}&nbsp;&nbsp;&nbsp;{{ Auth::user()->loc_name }}<br>Conf: {{Session::get('confirmation')}}&nbsp;&nbsp;&nbsp;Order Date: {{ date("m/d/Y h:i:s A") }}</strong></p>
        {{-- <br>
        <a href="{{ route('showConfirmedOrder') }}">{{Session::get('confirmation')}}</a> --}}
      {{--   <br>
        @php
            $confirmOrder = App\Order::where('confirmation', Session::get('confirmation'))->first();
        @endphp
        {{ $confirmOrder }} --}}
        <br>
        {!! $cartOrderProduction !!} 
    </div>
    
</div>
    
    {{-- <div class="thumbnail">
        <div class="caption">
            <h5 class="move-up">Questions about this order should be directed to:</h5>
            <strong>Order Portal Admin, Graphics + Design</strong><br>
            {{ Html::mailto('support@g-d.com') }} <br>
            <a href="{{ url('http://www.g-d.com') }}" title="G+D Support">www.g-d.com</a> <br>
            Ph: 813-254-9444 <br>
            Fax: 813-254-9445 <br>
        </div>    
    </div> --}}
</body>
</html>