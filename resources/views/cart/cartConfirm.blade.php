@extends('layouts/main')

@section('title')
Order Checkout
@endsection

@section('content')

<div class="container">

    <h1 class="move-up">Order Checkout
        <a href="{{ url('/') }}" class="btn btn-primary btn-md pull-right move-up">Continue Shopping</a>
        
        @if (Cart::count() > 0)
        <div style="float:right">
            <form action="{{ url('/emptyCart') }}" method="POST">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" class="btn btn-danger btn-md pull-right move-left" value="Empty Cart">
            </form>
        </div>
        @endif
    </h1>

    @if (session()->has('success_message'))
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('success_message') }}
    </div>
    @endif

    @if (session()->has('error_message'))
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('error_message') }}
    </div>
    @endif

    @if (sizeof(Cart::content()) > 0)
    <div class="row body-background">
        <table class="table">
            <thead>
                <tr>
                    <th class="table-image"></th>
                    <th>&nbsp;Product</th>
                    <th>Quantity</th>
                    {{-- <th>Price</th> --}}
                    {{-- <th class="column-spacer"></th> --}}
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach (Cart::content() as $item)
                @php
                $prod_layout = $item->options->prod_layout;
                @endphp
                <tr>
                    <td class="table-image">
                        <a href="{{ url(substr_replace($item->options->proofPath, 'pdf', -3)) }}" target="_blank"><img src="/{{ $item->options->proofPath }}" style="max-width:300px;" alt="proof" class="img-responsive cart-image move-right dropshadow"></a>
                    </td>
                    
                    <td>
                       <strong>{{ strip_tags($item->name) }}</strong>
                       <br>{!! $item->options->name !!} 
                       <br>{!! $item->options->email !!} 
                       <br><br>
                       <div class="text-muted move-up">
                        {!! nl2br($item->options->prod_description) !!} 
                    </div>
                </td>

                <td>
                    {!! Form::open(['route' => ['cart', 'method' => 'PATCH']]) !!}
                    
                    @if ($prod_layout == 'SBC' || $prod_layout == 'ABC' || $prod_layout == 'PBC')
                    {!! Form::select('qty', array('Select Quantity', '250' => '250', '500' => '500'), ['class' => 'quantity move-down'], ['style' => 'font-size:12px']) !!}
                    @endif
                    
                    @if ($prod_layout == 'SFYI' || $prod_layout == 'AFYI' || $prod_layout == 'PFYI')  
                    {!! Form::select('qty', array('Select Quantity', '4' => '4 Pads', '8' => '8 Pads'), ['class' => 'quantity move-down'], ['style' => 'font-size:12px']) !!}
                    @endif

                    @if ($prod_layout == 'SBCFYI' || $prod_layout == 'ABCFYI' || $prod_layout == 'PBCFYI')  
                    {!! Form::select('qty', array('Select Quantity', '24' => '250 BCs + 4 Pads', '28' => '250 BCs + 8 Pads', '54' => '500 BCs + 4 Pads', '58' => '500 BCs + 8 Pads',), ['class' => 'quantity move-down'], ['style' => 'font-size:12px']) !!}
                    @endif
                    
                    &nbsp;&nbsp;
                    
                    @php    
                    $bcfyi_qty = $item->qty;
                    if ($prod_layout == 'SBCFYI' || $prod_layout == 'ABCFYI' || $prod_layout == 'PBCFYI') {
                        switch ($item->qty) {
                            case '24': $bcfyi_qty = '250 BCs + 4 FYI Pads'; break;
                            case '28': $bcfyi_qty = '250 BCs + 8 FYI Pads'; break;
                            case '54': $bcfyi_qty = '500 BCs + 4 FYI Pads'; break;
                            case '58': $bcfyi_qty = '500 BCs + 8 FYI Pads'; break;
                            default: $bcfyi_qty = '250 BCs + 4 FYI Pads'; 
                        }
                    } 
                    if ($prod_layout == 'SFYI' || $prod_layout == 'AFYI' || $prod_layout == 'PFYI') {
                        switch ($item->qty) {
                            case '4': $bcfyi_qty = '4 FYI Pads'; break;
                            case '8': $bcfyi_qty = '8 FYI Pads'; break;
                            default: $bcfyi_qty = '4 FYI Pads'; 
                        }
                    }
                    if ($prod_layout == 'SBC' || $prod_layout == 'ABC' || $prod_layout == 'PBC') {
                        switch ($item->qty) {
                            case '250': $bcfyi_qty = '250 Business Cards'; break;
                            case '500': $bcfyi_qty = '500 Business Cards'; break;
                            default: $bcfyi_qty = '250 Business Cards'; 
                        }
                    }
                    Session::put('qty_text', $bcfyi_qty);
                    @endphp
                    
                    {!! Form::label('quantity', $bcfyi_qty, ['class' => 'quantity']) !!}
                    
                    <p>
                        {{-- {!! Form::hidden('rowId', $item->rowId) !!} --}}
                        {{-- {{ $rowId = $item->rowId }} --}}
                        <input type="hidden" name="rowId" value={{$item->rowId}}>
                        <input type="hidden" name="prod" value={{$item->options->prod_name}}>
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="title" value="{{Cart::get($item->rowId)->options->title}}">
                        <input type="hidden" name="prod_id" value="{{$item->options->prod_id}}">
                        <input type="hidden" name="prod_layout" value="{{$item->options->prod_layout}}">
                        <input type="submit" class="btn btn-success btn-xs move-down" value="Update Quantity">
                    </p>
                    {!! Form::close() !!}

                    <br>
                    @if ( $item->options->specialInstructions )
                    <div class="thumbnail" style="width:275px; font-size:12px">
                        <h5 class="move-up">Special Instructions:</h5>
                        {{ $item->options->specialInstructions }} 
                    </div>
                    @endif

                    <div> {{-- display variable items  --}}
                            {{-- rowId: {{ $item->rowId }} <br>
                            qty: {{ $item->qty }} <br>
                            name: {{ $item->options->name }} <br>
                            title: {{ $item->options->title }} <br>
                            community: {{ $item->options->community }} <br>
                            email: {{ $item->options->email }} <br>
                            address1: {{ $item->options->address1 }} <br>
                            address2: {{ $item->options->address2 }} <br>
                            phone: {{ $item->options->phone }} <br>
                            fax: {{ $item->options->fax }} <br>
                            prod_name: {{ $item->options->prod_name }}<br>
                            prod_id: {{ $item->options->prod_id }} <br>
                            proofPath: {{ $item->options->proofPath }}  --}}
                        </div>

                    </td>

                    <td>
                        <form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="btn btn-danger btn-xs" value="Remove">
                        </form>

                    </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="col-sm-12 col-md-12 col-lg-12">
                {{-- <br> --}}
                <div class="thumbnail">
                    {{-- <img style='border:1px solid #000000' src="assets/franchise/Photo Sales Rep BC - 60 Yr. Logo.jpg" class="img-responsive" alt="..."> --}}
                    <div class="caption">

                        @if (Session::get('rush') != 'no')
                            <h4 class='move-up'>This order will be shipped to:</h4>                           
                        @else
                            @if (Session::get('dt_rush') == "ASAP")
                                <h4 class='move-up'>This is a <strong>RUSH order, with expedited production, and delivery ASAP</strong><br><br>It will be shipped to:</h4>
                            @else
                                <h4 class='move-up'>This is a <strong>RUSH order, with an expected delivery date by {{ Session::get('dt_rush') }}</strong><br><br>It will be shipped to:</h4>
                            @endif
                        @endif

                        <strong>{{ Auth::user()->loc_name }}</strong>&nbsp;&nbsp;<small><a href="{{route('showProfile')}}">(change shipping info)</small></a><br>
                        Attn: {{ Auth::user()->contact_s }}<br>
                        @if (Auth::user()->username == 'HK35')
                             @if (Auth::user()->address2_s)
                                {{ Auth::user()->address1_s }}<br>
                                {{ Auth::user()->address2_s }}<br>
                                {{ Auth::user()->city_s }}, {{ Auth::user()->state_s }}, {{ Auth::user()->zip_s }}<br><br>
                            @else
                                {{ Auth::user()->address1_s }}<br>
                                {{ Auth::user()->city_s }}, {{ Auth::user()->state_s }}, {{ Auth::user()->zip_s }}<br><br>
                            @endif
                        @elseif (Auth::user()->username == 'HK46')
                             @if (Auth::user()->address2_s)
                                {{ Auth::user()->address1_s }}<br>
                                {{ Auth::user()->address2_s }}<br>
                                {{ Auth::user()->city_s }} {{ Auth::user()->state_s }} {{ Auth::user()->zip_s }}<br><br>
                            @else
                                {{ Auth::user()->address1_s }}<br>
                                {{ Auth::user()->city_s }} {{ Auth::user()->state_s }} {{ Auth::user()->zip_s }}<br><br>
                            @endif
                        @else
                            @if (Auth::user()->address2_s)
                                {{ Auth::user()->address1_s }}<br>
                                {{ Auth::user()->address2_s }}<br>
                                {{ Auth::user()->city_s }}, {{ Auth::user()->state_s }} {{ Auth::user()->zip_s }}<br><br>
                            @else
                                {{ Auth::user()->address1_s }}<br>
                                {{ Auth::user()->city_s }}, {{ Auth::user()->state_s }} {{ Auth::user()->zip_s }}<br><br>
                            @endif
                        @endif

                        <p><small>
                            An Email confirmation will be sent to the admin: {{ Auth::user()->contact_a }} ({{ Html::mailto(Auth::user()->email) }}).
                            <br>Most orders ship within 2-3 working days. 
                            <br> Please allow 1-2 weeks for engraved Partner Cards.
                        </small></p>

                        <form action="{{ route('cartorder') }}" method="POST">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <div class="thumbnail">
                                            <p class="move-down">
                                                <input type="hidden" name="rush" value="{{ Session::get('rush') }}">
                                                <input type="hidden" name="dt_rush" value="{{ Session::get('dt_rush') }}"> 
                                                <input type="checkbox" name="confirm" >&nbsp;&nbsp;I have reviewed the Proof(s) of my cart item(s) and confirm that it is correct. Unless I have specifically instructed to the contrary, I understand that production will commence upon submission, and will be shipped without delay.  
                                            </p>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            {!! csrf_field() !!}
                            <input type="submit" class="btn btn-success col-md-5 offset-md-4 pull-left" value="Yes, Place my Order">
                        </form>
                    {{-- </div> --}}
                    
                    {{-- <a href="{{view('cart/cartOrder')}}" class="col-md-5 offset-md-4 btn btn-success" role="button"> Yes, Place my Order </a> --}}
                    &nbsp;
                    <a href="/cart" class="col-md-5 offset-md-4 btn btn-danger pull-right" role="button"> No, Return to my Cart </a>
                </p>
            </div>    
        </div>
    </div>

    {{-- *UPS Ground charges will be added to the total shown. --}}

</div>
</div> <!-- end container -->   

@else
<div class="row body-background">
    <div class="container">
        <div class="row">
            <h3 class="text-center">You have no items in your shopping cart</h3>
        </div>
    </div>
</div>  
@endif

<div class="spacer"></div>

</div> <!-- end container -->

<div class="container">

    @endsection


