@extends('layouts.main')
{{-- {{ Session::put('prod_name', $request->prod_name) }} --}}
@section('title')
  Edit {{ strip_tags(Session::get('prod_name')) }}
@endsection

@section('content')
<div class="container">
  <div class="row">
    {{-- <h2 class="pull-left move-right move-up"> {{ Cart::get($rowId)->prod_name == 'Partner Business Card' }} - Data Edit</h2> --}}
    <h2 class="pull-left move-right move-up"> {{ $request->prod_name }} - Data Edit</h2>
  </div>

  <div class="row body-background">

    <div class="col-md-5">

      <br>
      <h5>Hover over the Template or Proof to magnify. <br> Click the Template or Proof to display a PDF in a new tab. <br>
      </h5>

      @if ($request->prod_id == 112)
        <a href="{{ url('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf') }}" target="_blank"><img src="{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg') }}" class="zoom img-responsive" width="100%" alt="..." data-magnify-src="{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg')}}"></a>
      @else
        <a href="{{ url('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf') }}" target="_blank"><img src="{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg') }}" class="zoom img-responsive dropshadow" width="100%" alt="..." data-magnify-src="{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg')}}"></a>
      @endif


      {{-- <h5><i>&nbsp;&nbsp;&nbsp;{!! strip_tags($request->prod_name) !!} Proof&nbsp;&nbsp;</i></h5> --}}
      <h5><i>&nbsp;&nbsp;&nbsp;{{ $request->prod_name }} Proof&nbsp;&nbsp;</i></h5>

      <br>

      <button class="btn btn-primary move-right hidden-print" onclick="printImg('{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg') }}')"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> &nbsp;&nbsp;&nbsp;Print the Proof&nbsp;&nbsp;&nbsp;</button>
      <br><br>
      <p class="description text-muted move-right">{!! nl2br(Session::get('prod_description')) !!}</p>

    </div>

    <div class="col-md-7">
      <br>

  <h4>Your Location: {{ Auth::user()->username }}  {{ Auth::user()->loc_name }}</h4>
 {{--  <h5>Enter the data for your {{strip_tags($request->prod_name)}}. <br> --}}
  <h5>Enter the data for your {{ $request->prod_name }}. <br>

 Create or Update your proof before adding the product to your cart.</h5>

 @if (($request->prod_id == 110 || $request->prod_id == 111) && (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46'))
    <h5><strong>Phone Numbers are formatted for your locality. Please list formatted reverse side Phone Numbers outside your locality in "Special Instuctions". Be sure to proof your reverse side phone numbers carefully before submission.</strong></h5>
  @endif

      <div class="panel panel-primary space-above">
      <div class="panel-body">

  {!! Form::open(['route' => 'showEdit', 'method' => 'POST', 'class' => 'form-horizontal', 'data-parsley-validate' => '']) !!}

{{--  //////////////////// NAMETAG //////////////////// --}}
@if ($request->prod_id == 112)
<div class="form-group">
  {!! Form::label('name', 'Name:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10 control-text">
    {!! Form::text('name', Session::get('name'), ['class' => 'form-control', 'placeholder' => 'Name']) !!}
  </div>
</div>
@endif

{{--  ////////////////////// BC FYI ///////////////////// --}}
  @if ($request->prod_id == 101 || $request->prod_id == 102 || $request->prod_id == 103 || $request->prod_id == 104 || $request->prod_id == 105 || $request->prod_id == 106 || $request->prod_id == 107 || $request->prod_id == 108 || $request->prod_id == 109 || $request->prod_layout == 'SBC' || $request->prod_layout == 'ABC' || $request->prod_layout == 'PBC' || $request->prod_layout == 'SFYI' || $request->prod_layout == 'AFYI' || $request->prod_layout == 'PFYI' || $request->prod_layout == 'SBCFYI' || $request->prod_layout == 'ABCFYI' || $request->prod_layout == 'PBCFYI'){{--  || Cart::get($rowId)->name == 'Staff Business Card' || Cart::get($rowId)->name == 'Associate Business Card' || Cart::get($rowId)->name == 'Partner Business Card' || Cart::get($rowId)->name == 'Staff FYI' || Cart::get($rowId)->name == 'Associate FYI' || Cart::get($rowId)->name == 'Partner FYI' || Cart::get($rowId)->name == 'Staff BC + FYI Pads' || Cart::get($rowId)->name == 'Associate BC + FYI Pads' || Cart::get($rowId)->name == 'Partner BC + FYI Pads') --}}

    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text">
          {!! Form::text('name', Session::get('name'), ['class' => 'form-control', 'placeholder' => 'Name']) !!}
      </div>
    </div>

    {{-- /////// Staff Titles /////// --}}
    @if ($request->prod_id == 101 || $request->prod_id == 104 || $request->prod_name == 'Staff Business Card' || $request->prod_name == 'Staff BC + FYI Pads')
      <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-10 control-text move-down">
          @if ($request->prod_id == 101 || $request->prod_name == 'Staff Business Card')
            {!! Form::select("title", $titles, null, [
              'class'                         => 'form-control',
              'placeholder'                   => 'Only Approved Titles Are Listed',
              'data-parsley-trigger'          => 'input',
              'style'                         => 'color:#8e8e92',
              'data-parsley-required'         => 'true',
              'data-parsley-required-message' => 'this field is required',
            ]) !!}
          @else
            {!! Form::select('title', $titles, null, [
              'class'                         => 'form-control',
              'placeholder'                   => 'Only Approved Titles Are Listed (Used for Business Card Only)',
              'data-parsley-trigger'          => 'input',
              'style'                         => 'color:#8e8e92',
              'data-parsley-required'         => 'true',
              'data-parsley-required-message' => 'this field is required',
            ]) !!}
          @endif
        </div>
      </div>
    @endif

    {{-- /////// Assoc & Partner Titles /////// --}}
    @if ($request->prod_id == 102 || $request->prod_id == 103 || $request->prod_id == 105 || $request->prod_id == 106 || $request->prod_name == "Associate Business Card" || $request->prod_name == "Partner Business Card" || $request->prod_name == "Associate BC + FYI Pads" || $request->prod_name == "Partner BC + FYI Pads")
      <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-10 control-text move-down">
          @if ($request->prod_id == 102 || $request->prod_id == 103 || $request->prod_name == "Associate Business Card" || $request->prod_name == "Partner Business Card")
            {!! Form::select("title", $titles, null, [
              'class'                         => 'form-control',
              'placeholder'                   => 'Only Approved Titles Are Listed',
              'data-parsley-trigger'          => 'input',
              'style'                         => 'color:#8e8e92',
            ]) !!}
          @else
            {!! Form::select('title', $titles, null, [
              'class'                         => 'form-control',
              'placeholder'                   => 'Only Approved Titles Are Listed (Used for Business Card Only)',
              'data-parsley-trigger'          => 'input',
              'style'                         => 'color:#8e8e92',
            ]) !!}
          @endif
        </div>
      </div>
    @endif
{{-- @php
    dd(Session::get('prod_layout'));
  @endphp --}}
    <div class="form-group">
      {!! Form::label('email', 'Email:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
        {!! Form::email('email', Session::get('email'), [
          'class'                         => 'form-control',
          'placeholder'                   => 'No Data',
          'data-parsley-required'         => 'true',
          'data-parsley-required-message' => 'this field is required'
        ]) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('address1', 'Address1:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('address1', Session::get('address1'), ['class' => 'form-control', 'placeholder' => 'No Data']) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('address2', 'Address2:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('address2', Session::get('address2'), ['class' => 'form-control', 'placeholder' => 'No Data']) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('city', 'City:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('city', Session::get('city'), ['class' => 'form-control', 'placeholder' => 'No Data']) !!}
      </div>
    </div>

    <div class="form-inline">

    <div class="form-group">
        {!! Form::label('state', 'State:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-4 control-text move-down">
          {!! Form::text('state', Session::get('state'), ['class' => 'form-control', 'placeholder' => 'No Data']) !!}
      </div>
      {!! Form::label('zip', 'Zip:&nbsp;&nbsp;&nbsp;', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
      <div class="col-sm-4 control-text-zip move-down">
          {!! Form::text('zip', Session::get('zip'), ['class' => 'form-control', 'placeholder' => 'No Data']) !!}
      </div>
    </div>

    <div class="col-xs-12" style="height:15px;"></div>
    <div class="form-group">
      {!! Form::label('phone', 'Phone:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-4 control-text move-down">

          {{-- Bogotá --}}
          @if (Auth::user()->username == 'HK34')
            {!! Form::text('phone', Session::get('phone'), [
              'class'                         => 'form-control',
              'placeholder'                   => 'xx.x.xxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}

          {{-- México --}}
          @elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46')
            {!! Form::text('phone', Session::get('phone'), [
              'class'                         => 'form-control',
              'placeholder'                   => 'xx.xx.xxxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'16',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 12 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 12 digits.',
            ]) !!}

          @else
            {!! Form::text('phone', Session::get('phone'), [
              'class'                         => 'form-control',
              'placeholder'                   => '123.123.1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
              ]) !!}
            @endif
      </div>

      {!! Form::label('fax', 'Fax:', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
        <div class="col-sm-4 control-text-zip move-down">

          {{-- Bogotá --}}
          @if (Auth::user()->username == 'HK34')
            {!! Form::text('fax', Session::get('fax'), [
              'class'                         => 'form-control',
              'placeholder'                   => 'xx.x.xxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}

          {{-- México --}}
          @elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46')
            {!! Form::text('fax', Session::get('fax'), [
              'class'                         => 'form-control',
              'placeholder'                   => 'xx.xx.xxxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'16',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 12 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 12 digits.',
            ]) !!}

          @else
            {!! Form::text('fax', Session::get('fax'), [
              'class'                         => 'form-control',
              'placeholder'                   => '123.123.1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
              ]) !!}
            @endif
        </div>
    </div>

</div>
 <div class="col-xs-12" style="height:15px;"></div>
    <div class="form-group">
      {!! Form::label('cell', 'Cell:', ['class' => 'col-sm-2 control-label move-down']) !!}
        <div class="col-sm-4 control-text move-down">

          {{-- Bogotá --}}
          @if (Auth::user()->username == 'HK34')
            {!! Form::text('cell', Session::get('cell'), [
              'class'                         => 'form-control',
              'placeholder'                   => 'xx.xxx.xxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'16',
              'data-parsley-maxlength-message'=>'Cell numbers should have exactly 12 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Cell numbers should have exactly 12 digits.',
            ]) !!}

          {{-- México --}}
          @elseif (Auth::user()->username == 'HK35')
            {!! Form::text('cell', Session::get('cell'), [
              'class'                         => 'form-control',
              'placeholder'                   => 'xx.xx.xxxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'16',
              'data-parsley-maxlength-message'=>'Cell numbers should have exactly 12 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Cell numbers should have exactly 12 digits.',
            ]) !!}

          {{-- UK --}}
          @elseif (Auth::user()->username == 'HK46')
            {!! Form::text('cell', Session::get('cell'), [
              'class'                         => 'form-control',
              'placeholder'                   => 'xx.xxxx.xxxxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'17',
              'data-parsley-maxlength-message'=>'Cell numbers should have no more than 14 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Cell numbers should have no less than 12 digits.',
            ]) !!}

          @else

            {!! Form::text('cell', $request->cell, [
              'class'                         => 'form-control',
              'placeholder'                   => '123.123.1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}
          @endif
      </div>
    </div>
@endif
    {{-- </div> --}} {{-- closes <div class="form-inline"> --}}

   {{-- ////////////////////  Double Sided BC  ///////////////// --}}
@if ($request->prod_id == 110 || $request->prod_id == 111 || $request->prod_layout == 'ADSBC' || $request->prod_layout == 'PDSBC')

<span style="margin:125px"><strong>Front Side</strong></span>
<span style="margin:20px"><strong>Reverse Side</strong></span>

<div class="form-group">
   <div class="form-inline">
        {!! Form::label('name', 'Name:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-5 control-text move-down">
          {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name on Front', 'style' => 'width:200px']) !!}
      </div>
      {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
      <div class="col-sm-5 control-text-zip move-down">
          {!! Form::text('name2', null, ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'Name on Back']) !!}
      </div>
    </div>
</div>
@php
  // dd($request->prod_layout);
@endphp
 {{-- /////// Assoc & Partner Titles /////// --}}
    @if ($request->prod_id == 110 || $request->prod_id == 111 || $request->prod_layout == 'ADSBC' || $request->prod_layout == 'PDSBC')
      <div class="form-group">
        <div class="form-inline">
          {!! Form::label('title', 'Title:', ['class' => 'move-down col-sm-2 control-label']) !!}
          <div class="col-sm-5 control-text move-down">
            {!! Form::select("title", $titles, null, [
              'class'                         => 'form-control',
              'placeholder'                   => 'Approved Titles',
              'data-parsley-trigger'          => 'input',
              'style'                         => 'color:#8e8e92',
              'style'                         => 'width:200px',
            ]) !!}
          </div>
          {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
          <div class="col-sm-5 control-text-zip move-down">
            {!! Form::select("title2", $titles, null, [
              'class'                         => 'form-control',
              'placeholder'                   => 'Approved Titles',
              'data-parsley-trigger'          => 'input',
              'style'                         => 'color:#8e8e92',
              'style'                         => 'width:200px',
            ]) !!}
        </div>
      {{-- </div> --}}
    @endif
      {{-- {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
      <div class="col-sm-5 control-text-zip move-down">
          {!! Form::text('title2', null, ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'Name on Back']) !!} --}}
      </div>
    </div>
{{-- </div> --}}

<div class="form-group">
  <div class="form-inline">
      {!! Form::label('email', 'Email:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-5 control-text move-down">
        {!! Form::email('email', Session::get('email'), [
          'class'                         => 'form-control',
          'style'                         => 'width:200px',
          'placeholder'                   => 'No Data',
          'data-parsley-required'         => 'true',
          'data-parsley-required-message' => 'this field is required'
        ]) !!}
      </div>
      {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
      <div class="col-sm-5 control-text-zip move-down">
        {!! Form::email('email2', Session::get('email2'), [
          'class'                         => 'form-control',
          'style'                         => 'width:200px',
          'placeholder'                   => 'No Data',
          'data-parsley-required'         => 'true',
          'data-parsley-required-message' => 'this field is required'
        ]) !!}
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="form-inline">
      {!! Form::label('address1', 'Address1:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-5 control-text move-down">
        {!! Form::text('address1', Session::get('address1'), ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'No Data']) !!}
      </div>
      {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
      <div class="col-sm-5 control-text-zip move-down">
        {!! Form::text('address1b', Session::get('address1b'), ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'No Data']) !!}
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="form-inline">
        {!! Form::label('address2', 'Address2:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-5 control-text move-down">
          {!! Form::text('address2', Session::get('address2'), ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'No Data']) !!}
      </div>
        {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
      <div class="col-sm-5 control-text-zip move-down">
          {!! Form::text('address2b', Session::get('address2b'), ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'No Data']) !!}
      </div>
    </div>
  </div>

 <div class="form-group">
    <div class="form-inline">
        {!! Form::label('city', 'City:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-5 control-text move-down">
          {!! Form::text('city', Session::get('city'), ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'No Data']) !!}
      </div>
      {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
      <div class="col-sm-5 control-text-zip move-down">
          {!! Form::text('city2', Session::get('city2'), ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'No Data']) !!}
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="form-inline">
        {!! Form::label('state', 'State:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-5 control-text move-down">
          {!! Form::text('state', Session::get('state'), ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'No Data']) !!}
      </div>
      {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
      <div class="col-sm-5 control-text-zip move-down">
          {!! Form::text('state2', Session::get('state2'), ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'No Data']) !!}
      </div>
    </div>
  </div>

 <div class="form-group">
    <div class="form-inline">
        {!! Form::label('zip', 'Zip:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-5 control-text move-down">
          {!! Form::text('zip', Session::get('zip'), ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'No Data']) !!}
      </div>
      {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
      <div class="col-sm-5 control-text-zip move-down">
          {!! Form::text('zip2', Session::get('zip2'), ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'No Data']) !!}
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="form-inline">
      {!! Form::label('phone', 'Phone:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-5 control-text move-down">

        {{-- Bogotá --}}
        @if (Auth::user()->username == 'HK34')
          {!! Form::text('phone', null, [
            'class'                         => 'form-control',
            'style'                         => 'width:200px',
            'placeholder'                   => 'xx.x.xxx.xxxx',
            'data-parsley-trigger'          => 'input',
            'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
            'data-parsley-maxlength'        =>'14',
            'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
            'data-parsley-minlength'        =>'10',
            'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
          ]) !!}

        {{-- México UK--}}
        @elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46')
          {!! Form::text('phone', null, [
            'class'                         => 'form-control',
            'style'                         => 'width:200px',
            'placeholder'                   => 'xx.xx.xxxx.xxxx',
            'data-parsley-trigger'          => 'input',
            'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
            'data-parsley-maxlength'        =>'16',
            'data-parsley-maxlength-message'=>'Phone numbers should have exactly 12 digits.',
            'data-parsley-minlength'        =>'12',
            'data-parsley-minlength-message'=>'Phone numbers should have exactly 12 digits.',
          ]) !!}

        @else
          {!! Form::text('phone', null, [
            'class'                         => 'form-control',
            'style'                         => 'width:200px',
            'placeholder'                   => '123.123.1234',
            'data-parsley-trigger'          => 'input',
            'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
            'data-parsley-maxlength'        =>'14',
            'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
            'data-parsley-minlength'        =>'10',
            'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
          ]) !!}
        @endif
      </div>

      {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
      <div class="col-sm-5 control-text-zip move-down">

        {{-- Bogotá --}}
        @if (Auth::user()->username == 'HK34')
          {!! Form::text('phone2', null, [
            'class'                         => 'form-control',
            'style'                         => 'width:200px',
            'placeholder'                   => 'xx.x.xxx.xxxx',
            'data-parsley-trigger'          => 'input',
            'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
            'data-parsley-maxlength'        =>'14',
            'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
            'data-parsley-minlength'        =>'10',
            'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
          ]) !!}

        {{-- México UK--}}
        @elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46')
          {!! Form::text('phone2', null, [
            'class'                         => 'form-control',
            'style'                         => 'width:200px',
            'placeholder'                   => 'xx.xx.xxxx.xxxx',
            'data-parsley-trigger'          => 'input',
            'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
            'data-parsley-maxlength'        =>'16',
            'data-parsley-maxlength-message'=>'Phone numbers should have exactly 12 digits.',
            'data-parsley-minlength'        =>'12',
            'data-parsley-minlength-message'=>'Phone numbers should have exactly 12 digits.',
          ]) !!}

        @else
          {!! Form::text('phone2', null, [
            'class'                         => 'form-control',
            'style'                         => 'width:200px',
            'placeholder'                   => '123.123.1234',
            'data-parsley-trigger'          => 'input',
            'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
            'data-parsley-maxlength'        =>'14',
            'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
            'data-parsley-minlength'        =>'10',
            'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
          ]) !!}
        @endif
      </div>
    </div>
  </div>

<div class="form-group">
    <div class="form-inline">
      {!! Form::label('fax', 'Fax:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-5 control-text move-down">

          {{-- Bogotá --}}
          @if (Auth::user()->username == 'HK34')
            {!! Form::text('fax', Session::get('fax'), [
              'class'                         => 'form-control',
              'style'                         => 'width:200px',
              'placeholder'                   => 'xx.x.xxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}

          {{-- México --}}
          @elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46')
            {!! Form::text('fax', Session::get('fax'), [
              'class'                         => 'form-control',
              'style'                         => 'width:200px',
              'placeholder'                   => 'xx.xx.xxxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'16',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 12 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 12 digits.',
            ]) !!}

          @else
            {!! Form::text('fax', Session::get('fax'), [
              'class'                         => 'form-control',
              'style'                         => 'width:200px',
              'placeholder'                   => '123.123.1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
              ]) !!}
            @endif
        </div>

        {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
        <div class="col-sm-5 control-text-zip move-down">

          {{-- Bogotá --}}
          @if (Auth::user()->username == 'HK34')
            {!! Form::text('fax2', Session::get('fax2'), [
              'class'                         => 'form-control',
              'style'                         => 'width:200px',
              'placeholder'                   => 'xx.x.xxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}

          {{-- México --}}
          @elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46')
            {!! Form::text('fax2', Session::get('fax2'), [
              'class'                         => 'form-control',
              'style'                         => 'width:200px',
              'placeholder'                   => 'xx.xx.xxxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'16',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 12 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 12 digits.',
            ]) !!}

          @else
            {!! Form::text('fax2', Session::get('fax2'), [
              'class'                         => 'form-control',
              'style'                         => 'width:200px',
              'placeholder'                   => '123.123.1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
              ]) !!}
            @endif
        </div>
      </div>
    </div>

  <div class="form-group">
    <div class="form-inline">
      {!! Form::label('cell', 'Cell:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-5 control-text move-down">

          {{-- Bogotá --}}
          @if (Auth::user()->username == 'HK34')
            {!! Form::text('cell', Session::get('cell'), [
              'class'                         => 'form-control',
              'style'                         => 'width:200px',
              'placeholder'                   => 'xx.x.xxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}

          {{-- México UK --}}
          @elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46')
            {!! Form::text('cell', Session::get('cell'), [
              'class'                         => 'form-control',
              'style'                         => 'width:200px',
              'placeholder'                   => 'xx.xx.xxxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'16',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 12 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 12 digits.',
            ]) !!}

          @else
            {!! Form::text('cell', Session::get('cell'), [
              'class'                         => 'form-control',
              'style'                         => 'width:200px',
              'placeholder'                   => '123.123.1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
              ]) !!}
            @endif
        </div>

        {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
        <div class="col-sm-5 control-text-zip move-down">

          {{-- Bogotá --}}
          @if (Auth::user()->username == 'HK34')
            {!! Form::text('cell2', Session::get('cell2'), [
              'class'                         => 'form-control',
              'style'                         => 'width:200px',
              'placeholder'                   => 'xx.x.xxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
            ]) !!}

          {{-- México --}}
          @elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46')
            {!! Form::text('cell2', Session::get('cell2'), [
              'class'                         => 'form-control',
              'style'                         => 'width:200px',
              'placeholder'                   => 'xx.xx.xxxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'16',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 12 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 12 digits.',
            ]) !!}

          @else
            {!! Form::text('cell2', Session::get('cell2'), [
              'class'                         => 'form-control',
              'style'                         => 'width:200px',
              'placeholder'                   => '123.123.1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have exactly 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have exactly 10 digits.',
              ]) !!}
            @endif
        </div>
      </div>
    </div>

  @endif

<div class="col-xs-12" style="height:15px;"></div>

    <div class="form-group">
    {!! Form::label('specialInstructions', 'Special Instructions:', ['class' => 'col-sm-2 control-label move-down']) !!}
    <div class="col-sm-10 move-down move-right">
    {!! Form::textarea('specialInstructions', Session::get('specialInstructions'), ['class' => 'form-control control-textarea move-right move-up', 'maxlength' => '200', 'rows' => '3', 'placeholder' => 'Enter any Special Instructions here.']) !!}
    <br><br>
    </div>
    </div>

    {!! Form::hidden('prod_id', $request->prod_id) !!}
    {!! Form::hidden('rowId', $request->rowId) !!}
    {!! Form::hidden('loc_name', Auth::user()->loc_name) !!}
    {!! Form::hidden('proofPath', Session::get('proofPath')) !!}
    {!! Form::hidden('prod_name', $request->prod_name) !!}
    {!! Form::hidden('prod_layout', $request->prod_layout) !!}
    {{-- <input type="hidden" name="prod_name" value="{{ Session::get('prod_name') }}"> --}}
    <input type="hidden" name="prod_description" value="{{ $request->prod_description }}">
   {{-- @php
    dd(Session::get('prod_layout'));
  @endphp --}}
  <div class="row text-center">

    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update Proof&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
    </div>
    <div class="col-xs-4">
      <a href="{{ url('/cart') }}" class="btn btn-danger" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    </div>
   {{-- <br><br> --}}
{!! Form::close() !!}

<div class="col-xs-4">

    {!! Form::open(['route' => 'editcart', 'class' => 'form-horizontal', 'data-parsley-validate' => '']) !!}
      <input name="_method" type="hidden" value="PATCH">
    {{-- <form action="editcart"> --}}
      {!! csrf_field() !!}

      <input type="hidden" name="rowId" value="{{ $request->rowId }}">
      {{-- <input type="hidden" name="prod_name" value="{{ $product->prod_name }}"> --}}
      {{-- <input type="hidden" name="price" value="{{ $product->price }}"> --}}
      {{-- <input type="hidden" name="proofed" value=1> --}}
      {{-- {!! Session::put('prod_layout', $product->prod_layout) !!} --}}
      {{-- <input type="hidden" name="email" value="{{ $request->email }}"> --}}
      {{-- <input type="hidden" name="qty" value="{!! $request->quantity !!}"> --}}
      <input type="hidden" name="prod_id" value="{!! $request->prod_id !!}">
      <input type="submit" class="btn btn-success btn-block" value="Update Cart">
    {{-- </form> --}}
    {!! Form::close() !!}
{{-- @endif --}}
<br>
  </div>

</div>
        </div> {{-- closes <div class="panel-body"> --}}
      </div> {{-- closes <div class="panel panel-primary space-above"> --}}

    </div> {{-- closes <div class="col-md-7"> --}}

  </div> {{-- closes <div class="row body-background"> --}}
  {{-- </div> --}}

@endsection

@section('extra-js')
  <script>
    $(document).ready(function() {
      $('.zoom').magnify({
        speed: 100,
        // src: '/images/product-large.jpg'
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('img').magnify({
        magnifiedWidth: 1000px,
        magnifiedHeight: 1000px,
      });
    });
</script>
<script>
function printImg(url) {
  var win = window.open('');
  win.document.write('<img style="width:600px;" src="' + url + '" onload="window.print();window.close()" />');
  win.focus();
}
</script>
@endsection







