@extends('layouts/main')

@section('title')
  My Cart
@endsection

@section('content')

<div class="container">

    <h1 class="move-up">My Cart
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
                        // dd($prod_layout);
                    @endphp

                    <tr>
                        <td class="table-image">
                            @if ($prod_layout == 'NTAG')
                                <a href="{{ url(substr_replace($item->options->proofPath, 'pdf', -3)) }}" target="_blank"><img src="{{ $item->options->proofPath }}" style="max-width:300px;" alt="proof" class="img-responsive cart-image move-right"></a>
                            @else
                                <a href="{{ url(substr_replace($item->options->proofPath, 'pdf', -3)) }}" target="_blank"><img src="{{ $item->options->proofPath }}" style="max-width:300px;" alt="proof" class="img-responsive cart-image move-right dropshadow"></a>
                            @endif
                        </td>



                        <td>
                            <strong>{{ strip_tags($item->name) }}</strong>
                            @if ($prod_layout == 'PDSBC' || $prod_layout == 'ADSBC')
                                <br><br><strong>Front Side:</strong>
                                <br>{!! $item->options->name !!}
                                <br>{!! $item->options->email !!}
                                <br><br><strong>Reverse Side:</strong>
                                <br>{!! $item->options->name2 !!}
                                <br>{!! $item->options->email2 !!}
                            @else
                                <br>{!! $item->options->name !!}
                                <br>{!! $item->options->email !!}
                            @endif
                            {{-- @php
                            dd($item->options);
                        @endphp --}}

                            <br><br>
                             <div class="text-muted move-up">
                                {!! nl2br($item->options->prod_description) !!}
                             </div>
                        </td>

                        <td>
                        {!! Form::open(['route' => ['cart', 'method' => 'PATCH']]) !!}

                        @if ($prod_layout == 'SBC' || $prod_layout == 'ABC' || $prod_layout == 'PBC' || $prod_layout == 'ADSBC' || $prod_layout == 'PDSBC')
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
                            if ($prod_layout == 'SBC' || $prod_layout == 'ABC' || $prod_layout == 'PBC' || $prod_layout == 'ADSBC' || $prod_layout == 'PDSBC') {
                                switch ($item->qty) {
                                    case '250': $bcfyi_qty = '250 Business Cards'; break;
                                    case '500': $bcfyi_qty = '500 Business Cards'; break;
                                    default: $bcfyi_qty = '250 Business Cards';
                                }
                            }
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
                            prod_id: {{ $item->options->prod_id }}  --}}
                            {{-- email: {{ $item->options->email }} <br> --}}
                            {{-- License: {{ $item->options->license }} --}}
                        </div>

                        </td>

                        <td>
                        <form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="btn btn-danger btn-xs" value="Remove">
                        </form>

                        @php
                            // dd($item->options->phone);
                            // exit;
                        @endphp

                        <form action="{{ route('showEdit') }}" method="POST" class="side-by-side">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="get">
                            <input type="hidden" name="rowId" value={{$item->rowId}}>
                            <input type="hidden" name="qty" value={{$item->qty}}>
                            {{-- <input type="hidden" name="price" value={{$item->price}}> --}}
                            <input type="hidden" name="name" value="{{$item->options->name}}">
                            <input type="hidden" name="title" value="{{$item->options->title}}">
                            <input type="hidden" name="email" value="{{$item->options->email}}">
                            <input type="hidden" name="address1" value="{{$item->options->address1}}">
                            <input type="hidden" name="address2" value="{{$item->options->address2}}">
                            <input type="hidden" name="city" value="{{$item->options->city}}">
                            <input type="hidden" name="state" value="{{$item->options->state}}">
                            <input type="hidden" name="zip" value="{{$item->options->zip}}">
                            <input type="hidden" name="phone" value="{{$item->options->phone}}">
                            <input type="hidden" name="fax" value="{{$item->options->fax}}">
                            <input type="hidden" name="cell" value="{{$item->options->cell}}">

                            <input type="hidden" name="name2" value="{{$item->options->name2}}">
                            <input type="hidden" name="title2" value="{{$item->options->title2}}">
                            <input type="hidden" name="email2" value="{{$item->options->email2}}">
                            <input type="hidden" name="address1b" value="{{$item->options->address1b}}">
                            <input type="hidden" name="address2b" value="{{$item->options->address2b}}">
                            <input type="hidden" name="city2" value="{{$item->options->city2}}">
                            <input type="hidden" name="state2" value="{{$item->options->state2}}">
                            <input type="hidden" name="zip2" value="{{$item->options->zip2}}">
                            <input type="hidden" name="phone2" value="{{$item->options->phone2}}">
                            <input type="hidden" name="fax2" value="{{$item->options->fax2}}">
                            <input type="hidden" name="cell2" value="{{$item->options->cell2}}">

                            <input type="hidden" name="specialInstructions" value="{{$item->options->specialInstructions}}">
                            <input type="hidden" name="prod_name" value="{{ $item->options->prod_name }}">
                            {{ Session::put('prod_name', $item->options->prod_name) }}
                            <input type="hidden" name="proofPath" value="{{$item->options->proofPath}}">
                            <input type="hidden" name="prod_id" value="{{$item->options->prod_id}}">
                            <input type="hidden" name="prod_layout" value="{{$item->options->prod_layout}}">
                            <input type="hidden" name="prod_description" value="{{$item->options->prod_description}}">
                            <input type="submit" class="btn btn-success btn-xs move-down" value="&nbsp;&nbsp;&nbsp; Edit &nbsp;&nbsp;">
                            {!! Form::close() !!}
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="thumbnail">

                        {!! Form::open(['route' => 'cartConfirm', 'method' => 'POST', 'class' => 'form-horizontal', 'data-parsley-validate' => '']) !!}
                             {{-- <div class="form-inline"> --}}
                            <div class="input-group">
                            <span class="input-group-addon move-down">
                            {!! Form::checkbox('rush', 'no', false, ['class' => 'move-right', 'style' => 'margin-left:30px']) !!} &nbsp;&nbsp;<strong>RUSH THIS ORDER &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>

                            <span class="input-group-addon", style = "text-align:right">
                            {!! Form::label('rushDate', 'Please ship this order to arrive by:', ['class' => 'move-down']) !!}
                            </span>
                            <span class="input-group-addon">
          {!! Form::date('rushDate', \Carbon\Carbon::now(), ['class' => 'move-left move-up']) !!}
      </span>
    </div>

        <br><span class="move-right" style="margin-left:50px">If "RUSH" is selected, all items in this cart will be produced and shipped on an ASAP expedited basis irrespective of date requested.</span><br><span class="move-right" style="margin-left:50px">RUSH Partner Business Cards in this cart will have Digital cards produced and shipped while the engraved version is being produced.<br>&nbsp;</span>
                </div>
            </div>
        </div>

    <input type="submit" class="btn btn-success btn-md pull-right move-up" style="margin-right:30px" value="Proceed to Checkout">
{!! Form::close() !!}
</div>
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


