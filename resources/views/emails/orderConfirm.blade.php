<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

    <img src="{{ url('assets/conf/' . Auth::user()->username . '/' . Session::get('confirmation') . '.png') }}" alt="">
    <div class="thumbnail">
        <div class="caption">
            <h3 class="move-up">Questions about this order should be directed to:</h3>
            <strong>HK Order Portal Admin</strong><br>
            {{ Html::mailto('support@g-d.com') }} <br>
            <a href="{{ url('http://www.g-d.com') }}" title="HK Order Portal Support">www.g-d.com</a> <br>
            Ph: 813-254-9444 <br>
            Fax: 813-254-9445 <br><br>
            @foreach (Cart::content() as $item)            
                PDF Proof of Product: <a href="{{ url(substr_replace($item->options->proofPath, 'pdf', -3)) }}">{{ $item->name }} for {{ $item->options->name }}</a><br>
            @endforeach
        </div>    
    </div>
    
</body>
</html>