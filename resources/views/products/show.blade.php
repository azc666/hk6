@extends('layouts.main')

@section('title')
  {{ strip_tags($product->prod_name) }}
@endsection

@section('content')
<div class="container">
  <div class="row">
    <h2 class="pull-left move-right move-up"> {{ strip_tags($product->prod_name) }} - Data Entry</h2>
  </div>

  <div class="row body-background">

    <div class="col-md-5">

    <br>
    <h5>Hover over the Template or Proof to magnify. <br> Click the Template or Proof to display a PDF in a new tab. <br>
    </h5>

      @if (file_exists('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf'))
        <a href="{{ url('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf') }}" target="_blank"><img src="{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg') }}" class="zoom img-responsive dropshadow" width="100%" alt="..." data-magnify-src="{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg')}}"></a>

        <h5><i>&nbsp;&nbsp;&nbsp;{!! strip_tags($product->prod_name) !!} Proof&nbsp;&nbsp;</i></h5>

<br>
{{-- <img src="{{ url('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf') }}" /> --}}
{{-- <button onclick="printImg('{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg') }}')">Print</button> --}}
<button class="btn btn-primary move-right hidden-print" onclick="printImg('{{ url('/assets/mpdf/temp/' . Auth::user()->username . '/showData.jpg') }}')"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> &nbsp;&nbsp;&nbsp;Print the Proof&nbsp;&nbsp;&nbsp;</button>
<br><br>
<p class="description text-muted move-right">{!! nl2br($product->description) !!}</p>

      @else
          <div>

            @php
            if (Auth::user()->username == 'HK35') {
              $product->id == 103 ? $imagePath  = '/assets/partner/mexico_pbc.jpg' : '';
              $product->id == 109 ? $imagePath  = '/assets/partner/mexico_pfyi.jpg' : '';
              $product->id == 106 ? $imagePath  = '/assets/partner/mexico_pbcfyi.jpg' : '';
              $product->id == 102 ? $imagePath  = '/assets/associate/mexico_abc.jpg' : '';
              $product->id == 108 ? $imagePath  = '/assets/associate/mexico_afyi.jpg' : '';
              $product->id == 105 ? $imagePath  = '/assets/associate/mexico_abcfyi.jpg' : '';
              $product->id == 101 ? $imagePath  = '/assets/staff/mexico_sbc.jpg' : '';
              $product->id == 107 ? $imagePath  = '/assets/staff/mexico_sfyi.jpg' : '';
              $product->id == 104 ? $imagePath  = '/assets/staff/mexico_sbcfyi.jpg' : '';
              $product->id == 110 ? $imagePath  = '/assets/associate/mexico_adsbc.jpg' : '';
              $product->id == 111 ? $imagePath  = '/assets/partner/mexico_pdsbc.jpg' : '';
            } elseif (Auth::user()->username == 'HK34') {
              $product->id == 103 ? $imagePath  = '/assets/partner/bogota_pbc.jpg' : '';
              $product->id == 109 ? $imagePath  = '/assets/partner/bogota_pfyi.jpg' : '';
              $product->id == 106 ? $imagePath  = '/assets/partner/bogota_pbcfyi.jpg' : '';
              $product->id == 102 ? $imagePath  = '/assets/associate/bogota_abc.jpg' : '';
              $product->id == 108 ? $imagePath  = '/assets/associate/bogota_afyi.jpg' : '';
              $product->id == 105 ? $imagePath  = '/assets/associate/bogota_abcfyi.jpg' : '';
              $product->id == 101 ? $imagePath  = '/assets/staff/bogota_sbc.jpg' : '';
              $product->id == 107 ? $imagePath  = '/assets/staff/bogota_sfyi.jpg' : '';
              $product->id == 104 ? $imagePath  = '/assets/staff/bogota_sbcfyi.jpg' : '';
              $product->id == 110 ? $imagePath  = '/assets/associate/bogota_adsbc.jpg' : '';
              $product->id == 111 ? $imagePath  = '/assets/partner/bogota_pdsbc.jpg' : '';
            } elseif (Auth::user()->username == 'HK46') {
              $product->id == 103 ? $imagePath  = '/assets/partner/london_pbc.jpg' : '';
              $product->id == 109 ? $imagePath  = '/assets/partner/london_pfyi.jpg' : '';
              $product->id == 106 ? $imagePath  = '/assets/partner/london_pbcfyi.jpg' : '';
              $product->id == 102 ? $imagePath  = '/assets/associate/london_abc.jpg' : '';
              $product->id == 108 ? $imagePath  = '/assets/associate/london_afyi.jpg' : '';
              $product->id == 105 ? $imagePath  = '/assets/associate/london_abcfyi.jpg' : '';
              $product->id == 101 ? $imagePath  = '/assets/staff/london_sbc.jpg' : '';
              $product->id == 107 ? $imagePath  = '/assets/staff/london_sfyi.jpg' : '';
              $product->id == 104 ? $imagePath  = '/assets/staff/london_sbcfyi.jpg' : '';
              $product->id == 110 ? $imagePath  = '/assets/associate/london_adsbc.jpg' : '';
              $product->id == 111 ? $imagePath  = '/assets/partner/london_pdsbc.jpg' : '';
            }
            @endphp

            @if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46')
              <a href="{{ url(substr_replace($imagePath, 'pdf', -3)) }}" title="Open PDF of Template in new window" target="_blank"><img src="{{ $imagePath }}" class="img-responsive dropshadow" alt="..."></a>
           @else
              <a href="{{ url(substr_replace($product->imagePath, 'pdf', -3)) }}" title="Open PDF of Template in new window" target="_blank"><img src="{{ $product->imagePath }}" class="img-responsive dropshadow" alt="..."></a>
           @endif


            <h5><i>&nbsp;&nbsp;{!! strip_tags($product->prod_name) !!} Template&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></h5>
            <br>
            <p class="description text-muted move-right">{!! nl2br($product->description) !!}</p>
          </div>
        @endif

      <br>

    </div>

    <div class="col-md-7">
      <br>

  <h4>Your Location: {{ Auth::user()->username }}  {{ Auth::user()->loc_name }}</h4>
  <h5>Enter the data for your {{strip_tags($product->prod_name)}}. <br>

  Create or Update your proof before adding the product to your cart.</h5>

  @if (($product->id == 110 || $product->id == 111) && (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46'))
    <h5><strong>Phone Numbers are formatted for your locality. Please list formatted reverse side Phone Numbers outside your locality in "Special Instuctions". Be sure to proof your reverse side phone numbers carefully before submission.</strong></h5>
  @endif

      <div class="panel panel-primary space-above">
      <div class="panel-body">

  {!! Form::open(['route' => 'showData', 'method' => 'POST', 'class' => 'form-horizontal', 'data-parsley-validate' => '']) !!}

{{--  //////////////////// NAMETAG //////////////////// --}}
@if ($product->id == 112)
<div class="form-group">
  {!! Form::label('name', 'Name:', ['class' => 'col-sm-2 control-label']) !!}
  <div class="col-sm-10 control-text">
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
  </div>
</div>
@endif

{{--  //////////////////// BC FYI //////////////////// --}}
  @if ($product->id == 101 || $product->id == 102 ||  $product->id == 103 || $product->id == 104 || $product->id == 105 || $product->id == 106 || $product->id == 107 || $product->id == 108 || $product->id == 109)
    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text">
          {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
      </div>
    </div>

          {{-- /////// Staff Titles /////// --}}
    @if ($product->id == 101 || $product->id == 104)
      <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-10 control-text move-down">
          @if ($product->id == 101)
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
    @if ($product->id == 102 || $product->id == 103 || $product->id == 105 || $product->id == 106 || $product->id == 110 || $product->id == 111)
      <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-10 control-text move-down">
          @if ($product->id == 102 || $product->id == 103 || $product->id == 110 || $product->id == 111)
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

    <div class="form-group">
      {!! Form::label('email', 'Email:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">

          {!! Form::email('email', null, [
            'class'                         => 'form-control',
            'data-parsley-required'         => 'true',
            'data-parsley-required-message' => 'this field is required',
            'placeholder'                   => 'Use lowercase letters and a valid email address',
            ]) !!}
        {{-- @endif --}}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('address1', 'Address1:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('address1', Auth::user()->loc_address1, ['class' => 'form-control', 'placeholder' => 'Address 1']) !!}
      </div>
    </div>

    @if (!file_exists('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf'))
      <div class="form-group">
          {!! Form::label('address2', 'Address2:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-10 control-text move-down">
            {!! Form::text('address2', Auth::user()->loc_address2, ['class' => 'form-control', 'placeholder' => 'Address 2 (Optional)']) !!}
        </div>
      </div>
    @else
      <div class="form-group">
          {!! Form::label('address2', 'Address2:', ['class' => 'move-down col-sm-2 control-label']) !!}
        <div class="col-sm-10 control-text move-down">
            {!! Form::text('address2', $request->address2, ['class' => 'form-control', 'placeholder' => 'Address 2 (Optional)']) !!}
        </div>
      </div>
    @endif


    <div class="form-group">
        {!! Form::label('city', 'City:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('city', Auth::user()->loc_city, ['class' => 'form-control', 'placeholder' => 'City']) !!}
      </div>
    </div>

  <div class="form-inline">

    <div class="form-group">
        {!! Form::label('state', 'State:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-4 control-text move-down">
          {!! Form::text('state', Auth::user()->loc_state, ['class' => 'form-control', 'placeholder' => 'State']) !!}
      </div>
      {!! Form::label('zip', 'Zip:&nbsp;&nbsp;&nbsp;', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
      <div class="col-sm-4 control-text-zip move-down">
          {!! Form::text('zip', Auth::user()->loc_zip, ['class' => 'form-control', 'placeholder' => 'Zip']) !!}
      </div>
    </div>

  <div class="col-xs-12" style="height:15px;"></div>
    <div class="form-group">
      {!! Form::label('phone', 'Phone:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-4 control-text move-down">

        {{-- Bogotá --}}
        @if (Auth::user()->username == 'HK34')
          {!! Form::text('phone', null, [
            'class'                         => 'form-control',
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
            {!! Form::text('fax', null, [
              'class'                         => 'form-control',
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
            {!! Form::text('fax', null, [
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
            {!! Form::text('fax', null, [
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
<div class="col-xs-12" style="height:15px;"></div>

    <div class="form-group">
      {!! Form::label('cell', 'Cell:', ['class' => 'col-sm-2 control-label move-down']) !!}
        <div class="col-sm-4 control-text move-down">

          {{-- Bogotá --}}
          @if (Auth::user()->username == 'HK34')
            {!! Form::text('cell', null, [
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
            {!! Form::text('cell', null, [
              'class'                         => 'form-control',
              'placeholder'                   => 'xx.xx.xxxx.xxxx',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'16',
              'data-parsley-maxlength-message'=>'Cell numbers should have no more than 14 digits.',
              'data-parsley-minlength'        =>'12',
              'data-parsley-minlength-message'=>'Cell numbers should have no less than 12 digits.',
            ]) !!}

            {{-- UK --}}
          @elseif (Auth::user()->username == 'HK46')
            {!! Form::text('cell', null, [
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
            {!! Form::text('cell', null, [
              'class'                         => 'form-control',
              'placeholder'                   => '123.123.1234',
              'data-parsley-trigger'          => 'input',
              'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
              'data-parsley-maxlength'        =>'14',
              'data-parsley-maxlength-message'=>'Phone numbers should have no more than 10 digits.',
              'data-parsley-minlength'        =>'10',
              'data-parsley-minlength-message'=>'Phone numbers should have no less than 10 digits.',
            ]) !!}
          @endif
        </div>
    </div>
  </div>

  @endif

{{--  //////////////// Double Sided BC //////////////// --}}
  @if ($product->id == 110 || $product->id == 111)

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

   {{-- /////// Assoc & Partner Titles /////// --}}
@if ($product->id == 110 || $product->id == 111)
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
    </div>
  </div>
@endif

<div class="form-group">
  <div class="form-inline">
    {!! Form::label('email', 'Email:', ['class' => 'move-down col-sm-2 control-label']) !!}
    <div class="col-sm-5 control-text move-down">
      {!! Form::email('email', null, [
        'class'                         => 'form-control',
        'data-parsley-required'         => 'true',
        'data-parsley-required-message' => 'this field is required',
        'placeholder'                   => 'Valid email address',
        'style'                         => 'color:#8e8e92',
        'style'                         => 'width:200px',
        ]) !!}
    </div>
    {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
    <div class="col-sm-5 control-text-zip move-down">
      {!! Form::email('email2', null, [
        'class'                         => 'form-control',
        'data-parsley-required'         => 'true',
        'data-parsley-required-message' => 'this field is required',
        'placeholder'                   => 'Valid email address',
        'style'                         => 'color:#8e8e92',
        'style'                         => 'width:200px',
      ]) !!}
    </div>
  </div>
</div>

<div class="form-group">
  <div class="form-inline">
    {!! Form::label('address1', 'Address1:', ['class' => 'move-down col-sm-2 control-label']) !!}
    <div class="col-sm-5 control-text move-down">
      {!! Form::text('address1', Auth::user()->loc_address1, ['class' => 'form-control',  'style' => 'width:200px', 'placeholder' => 'Address1 Front']) !!}
    </div>
    {!! Form::label('address1b', 'Address1:', ['class' => 'move-down control-label']) !!}
    <div class="col-sm-5 control-text-zip move-down">
      {!! Form::text('address1b', null, ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'Address1 Back']) !!}
    </div>
  </div>
</div>

<div class="form-group">
  <div class="form-inline">
    @if (!file_exists('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf'))
      {!! Form::label('address2', 'Address2:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-5 control-text move-down">
        {!! Form::text('address2', Auth::user()->loc_address2, ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'Address2 Front']) !!}
      </div>
    @else
      {!! Form::label('address2', 'Address2:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-5 control-text move-down">
        {!! Form::text('address2', $request->address2, ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'Address2 Front']) !!}
      </div>
    @endif
    {!! Form::label('address2b', 'Address2:', ['class' => 'move-down control-label']) !!}
    <div class="col-sm-5 control-text-zip move-down">
      {!! Form::text('address2b', null, ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'Address2 Back']) !!}
    </div>
  </div>
</div>

<div class="form-group">
  <div class="form-inline">
    {!! Form::label('city', 'City:', ['class' => 'move-down col-sm-2 control-label']) !!}
    <div class="col-sm-5 control-text move-down">
      {!! Form::text('city', Auth::user()->loc_city, ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'City Front']) !!}
    </div>
    {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
    <div class="col-sm-5 control-text-zip move-down">
      {!! Form::text('city2', null, ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'City Back']) !!}
    </div>
  </div>
</div>

<div class="form-group">
  <div class="form-inline">
    {!! Form::label('state', 'State:', ['class' => 'move-down col-sm-2 control-label']) !!}
    <div class="col-sm-5 control-text move-down">
      {!! Form::text('state', Auth::user()->loc_state, ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'State Front']) !!}
    </div>
    {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
    <div class="col-sm-5 control-text-zip move-down">
      {!! Form::text('state2', null, ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'State Back']) !!}
    </div>
  </div>
</div>

<div class="form-group">
  <div class="form-inline">
    {!! Form::label('zip', 'Zip:', ['class' => 'move-down col-sm-2 control-label']) !!}
    <div class="col-sm-5 control-text move-down">
      {!! Form::text('zip', Auth::user()->loc_zip, ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'Zip Front']) !!}
    </div>
    {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
    <div class="col-sm-5 control-text-zip move-down">
        {!! Form::text('zip2', null, ['class' => 'form-control', 'style' => 'width:200px', 'placeholder' => 'Zip Back']) !!}
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
      {{-- @if (Auth::user()->username == 'HK34')
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
        ]) !!} --}}
        @if (Auth::user()->username == 'HK34')
        {!! Form::text('phone2', null, [
          'class'                         => 'form-control',
          'style'                         => 'width:200px',
          'placeholder'                   => 'xx.x.xxx.xxxx',
          'data-parsley-trigger'          => 'input',
          'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
        ]) !!}

      {{-- México UK--}}
      {{-- @elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46')
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
        ]) !!} --}}
        @elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46')
        {!! Form::text('phone2', null, [
          'class'                         => 'form-control',
          'style'                         => 'width:200px',
          'placeholder'                   => 'xx.xx.xxxx.xxxx',
          'data-parsley-trigger'          => 'input',
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
        {!! Form::text('fax', null, [
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
          {!! Form::text('fax', null, [
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
          {!! Form::text('fax', null, [
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
          {!! Form::text('fax2', null, [
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
          {!! Form::text('fax2', null, [
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
          {!! Form::text('fax2', null, [
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
    {!! Form::label('cell', 'Cell:', ['class' => 'col-sm-2 control-label move-down']) !!}
    <div class="col-sm-5 control-text move-down">

      {{-- Bogotá --}}
      @if (Auth::user()->username == 'HK34')
        {!! Form::text('cell', null, [
          'class'                         => 'form-control',
          'style'                         => 'width:200px',
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
        {!! Form::text('cell', null, [
          'class'                         => 'form-control',
          'style'                         => 'width:200px',
          'placeholder'                   => 'xx.xx.xxxx.xxxx',
          'data-parsley-trigger'          => 'input',
          'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
          'data-parsley-maxlength'        =>'16',
          'data-parsley-maxlength-message'=>'Cell numbers should have no more than 14 digits.',
          'data-parsley-minlength'        =>'12',
          'data-parsley-minlength-message'=>'Cell numbers should have no less than 12 digits.',
        ]) !!}

      {{-- UK --}}
      @elseif (Auth::user()->username == 'HK46')
        {!! Form::text('cell', null, [
          'class'                         => 'form-control',
          'style'                         => 'width:200px',
          'placeholder'                   => 'xx.xxxx.xxxxxx',
          'data-parsley-trigger'          => 'input',
          'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
          'data-parsley-maxlength'        =>'17',
          'data-parsley-maxlength-message'=>'Cell numbers should have no more than 14 digits.',
          'data-parsley-minlength'        =>'12',
          'data-parsley-minlength-message'=>'Cell numbers should have no less than 12 digits.',
        ]) !!}

      @else
        {!! Form::text('cell', null, [
          'class'                         => 'form-control',
          'style'                         => 'width:200px',
          'placeholder'                   => '123.123.1234',
          'data-parsley-trigger'          => 'input',
          'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
          'data-parsley-maxlength'        =>'14',
          'data-parsley-maxlength-message'=>'Phone numbers should have no more than 10 digits.',
          'data-parsley-minlength'        =>'10',
          'data-parsley-minlength-message'=>'Phone numbers should have no less than 10 digits.',
        ]) !!}
      @endif
    </div>

    {!! Form::label('', '', ['class' => 'move-down control-label']) !!}
      <div class="col-sm-5 control-text-zip move-down">

      {{-- Bogotá --}}
      @if (Auth::user()->username == 'HK34')
        {!! Form::text('cell2', null, [
          'class'                         => 'form-control',
          'style'                         => 'width:200px',
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
        {!! Form::text('cell2', null, [
          'class'                         => 'form-control',
          'style'                         => 'width:200px',
          'placeholder'                   => 'xx.xx.xxxx.xxxx',
          'data-parsley-trigger'          => 'input',
          'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
          'data-parsley-maxlength'        =>'16',
          'data-parsley-maxlength-message'=>'Cell numbers should have no more than 14 digits.',
          'data-parsley-minlength'        =>'12',
          'data-parsley-minlength-message'=>'Cell numbers should have no less than 12 digits.',
        ]) !!}

        {{-- UK --}}
      @elseif (Auth::user()->username == 'HK46')
        {!! Form::text('cell2', null, [
          'class'                         => 'form-control',
          'style'                         => 'width:200px',
          'placeholder'                   => 'xx.xxxx.xxxxxx',
          'data-parsley-trigger'          => 'input',
          'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
          'data-parsley-maxlength'        =>'17',
          'data-parsley-maxlength-message'=>'Cell numbers should have no more than 14 digits.',
          'data-parsley-minlength'        =>'12',
          'data-parsley-minlength-message'=>'Cell numbers should have no less than 12 digits.',
        ]) !!}

      @else
        {!! Form::text('cell2', null, [
          'class'                         => 'form-control',
          'style'                         => 'width:200px',
          'placeholder'                   => '123.123.1234',
          'data-parsley-trigger'          => 'input',
          'data-parsley-pattern'          => '^[\d\+\-\.\(\)\/\s]*$',
          'data-parsley-maxlength'        =>'14',
          'data-parsley-maxlength-message'=>'Phone numbers should have no more than 10 digits.',
          'data-parsley-minlength'        =>'10',
          'data-parsley-minlength-message'=>'Phone numbers should have no less than 10 digits.',
        ]) !!}
      @endif
    </div>
  </div>
</div>

@endif
{{-- </div> --}}
{{-- <div class="col-xs-12" style="height:15px;"></div> --}}

<div class="form-group">
  {!! Form::label('specialInstructions', 'Special Instructions:', ['class' => 'col-sm-2 control-label move-down']) !!}
  <div class="col-sm-10 move-down move-right">
    {!! Form::textarea('specialInstructions', null, ['class' => 'form-control control-textarea move-right move-down', 'maxlength' => '200', 'rows' => '3', 'placeholder' => 'Enter any Special Instructions here.']) !!}
    <br> <br>
  </div>
</div>

{!! Form::hidden('id', $product->id) !!}
{!! Form::hidden('prod_name', $product->prod_name) !!}
{!! Form::hidden('prod_description', $product->description) !!}
{!! Form::hidden('imagePath', $product->imagePath) !!}
{!! Form::hidden('loc_name', Auth::user()->loc_name) !!}

<div class="row text-center">
@php
  // dd($request->city)
@endphp
  <div class="col-xs-4">
    <button type="submit" class="btn btn-primary btn-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create Proof&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
  </div>
  <div class="col-xs-4">

    @if ($product->id == 101 || $product->id == 104 || $product->id == 107)
      <a href="{{ url('/staff') }}" class="btn btn-danger" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    @elseif ($product->id == 102 || $product->id == 105 || $product->id == 108)
      <a href="{{ url('/associate') }}" class="btn btn-danger" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    @elseif ($product->id == 103 || $product->id == 106 || $product->id == 109 || $product->id == 110 || $product->id == 111)
      <a href="{{ url('/partner') }}" class="btn btn-danger" role="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    @endif

  </div>

{!! Form::close() !!}

<div class="col-xs-4">

  @if (file_exists('assets/mpdf/temp/' . Auth::user()->username . '/showData.pdf'))
    <form action="/cart" method="POST">
      {!! csrf_field() !!}
      <input type="hidden" name="id" value="{{ $product->id }}">
      {{-- <input type="hidden" name="prod_id" value="{{ $product->id }}"> --}}
      <input type="hidden" name="name" value="{{ $product->prod_name }}">
      <input type="hidden" name="price" value="{{ $product->price }}">
      {!! Session::put('prod_layout', $product->prod_layout) !!}
      {{-- <input type="hidden" name="email" value="{{ $request->email }}"> --}}
      <input type="hidden" name="quantity" value="{!! $product->quantity !!}">
      <input type="hidden" name="address1b" value="{!! $request->address1b !!}">
      <input type="submit" class="btn btn-success btn-block" value="Add to Cart">
    </form>
  @endif

</div>

</div>{{-- closes <div class="panel-body"> --}}
    </div>{{-- closes <div class="panel panel-primary space-above"> --}}
  </div>
</div> {{-- closes <div class="col-md-7"> --}}
</div> {{-- closes <div class="row body-background"> --}}

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




