<html>
    <head>
        <title>Contact Us</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/product.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-maxlength/1.7.0/bootstrap-maxlength.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>

    <div class="container"> 
        <div class="row body-background">
            <div class="col-md-6 col-md-offset-1">
                <br>
                {{ Html::image('assets/HKheader2.png', 'HK Logo', [
                    'style' => 'max-width:600px',
                    'class' => 'img-responsive move-right move-down'
                ]) }}
                {{-- <img src="{{ $message->embed(asset('/assets/header2.png')) }} style="max-width:600px;" alt="HK Logo" class="img-responsive move-right move-down"><br> --}}
                {{-- <img src="{{asset('assets/header2.png')}}"> --}}
            </div>
            <div class="col-md-8 col-md-offset-2">
                <h4>Hi {{ Session::get('contactus_name') }},<br><br>
                Thank you for contacting {{ Html::mailto('support@g-d.com') }}. </h4>

                <h5>Your support request has been received and we will get back to you ASAP!</h5>
                <br>
                <h5>Sent from: HK{{ Session::get('loc_num') }} {{ Session::get('loc_name') }}</h5>
                {{-- <br> --}}
                <h5>Sent by: {{ Session::get('contactus_name') }}</h5>
                {{-- <br> --}}
                <h5>Reply to email: {{ Session::get('contactus_email') }}</h5>
                <br>

        <div class="container">
            <div class="col-md-6">
                <div class="thumbnail">
                    <h5><strong>Your Inquiry:</strong></h5>
                    &nbsp;{{Session::get('contactMessage')}}
                    <br>&nbsp;
                </div>
            </div>
        </div>

        <br><br>

        <strong>Questions about this Support Request should be directed to:</strong><br>
        Order Portal Admin, Graphics + Design<br>
        {{ Html::mailto('support@g-d.com') }} <br>
        <a href="{{ url('http://www.g-d.com') }}" title="G+D Support">www.g-d.com</a> <br>
        Ph: 813-254-9444 <br>
        Fax: 813-254-9445 <br><br><br>
        </div>
    </div>
</div>
</body>
</html>
