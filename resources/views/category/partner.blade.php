@extends('layouts/main')

@section('title')
  Partner Stationery Items
@endsection

@section('content')

{{-- <br> --}}
<div class="container">     
<div class="row">
  <h2 class="pull-left move-up"> Select a Partner Stationery Item </h2>
  <a href="{{ url("/") }}" class="btn btn-primary pull-right" role="button">Return to Select a Category Page</a>
  {{-- </div> --}}
</div>
        
<div class="row body-background">   

    <div class="col-sm-3 col-md-4">
        <br>
        <div class="thumbnail">
            @if (Auth::user()->username == 'HK35')
                <img src="assets/partner/mexico_pbc_display.jpg" class="img-responsive" alt="Partner Stationery Items">
            @elseif (Auth::user()->username == 'HK34')
                <img src="assets/partner/bogota_pbc_display.jpg" class="img-responsive" alt="Partner Stationery Items">
            @elseif (Auth::user()->username == 'HK46')
                <img src="assets/partner/london_pbc_display.jpg" class="img-responsive" alt="Partner Stationery Items">
            @else
                <img src="assets/partner/pbc_display.jpg" class="img-responsive" alt="Partner Stationery Items">
            @endif
            <div class="caption">
                <h3> Business Cards </h3><br>
                
                    <p class="description text-muted">{!! nl2br($product[2]->description) !!}</p>
                    <p><a href="{!! url("/categories/10") !!}" class="btn btn-primary btn-block" role="button"> Select Business Cards </a></p>
                
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-md-4">
        <br>
        <div class="thumbnail">
            @if (Auth::user()->username == 'HK35')
                <img src="assets/partner/mexico_pfyi_display.jpg" class="img-responsive" alt="Partner Stationery Items">
            @elseif (Auth::user()->username == 'HK34')
                <img src="assets/partner/bogota_pfyi_display.jpg" class="img-responsive" alt="Partner Stationery Items">
            @elseif (Auth::user()->username == 'HK46')
                <img src="assets/partner/london_pfyi_display.jpg" class="img-responsive" alt="Partner Stationery Items">
            @else
                <img src="assets/partner/pfyi_display.jpg" class="img-responsive" alt="Partner Stationery Items">
            @endif
            <div class="caption">
                <h3> FYI Pads </h3><br>
                <p class="description text-muted">{!! nl2br($product[7]->description) !!}</p>
                    <p>
                        <a href="{!! url("/categories/11") !!}" class="btn btn-primary btn-block" role="button"> Select FYI Pads </a>
                    </p>
            </div>    
        </div>
    </div>

    <div class="col-sm-4 col-md-4">
        <br>
        <div class="thumbnail">
            @if (Auth::user()->username == 'HK35')
                <img src="assets/partner/mexico_pbcfyi_display.jpg" class="img-responsive" alt="Partner Stationery Items">
            @elseif (Auth::user()->username == 'HK34')
                <img src="assets/partner/bogota_pbcfyi_display.jpg" class="img-responsive" alt="Partner Stationery Items">
            @elseif (Auth::user()->username == 'HK46')
                <img src="assets/partner/london_pbcfyi_display.jpg" class="img-responsive" alt="Partner Stationery Items">
            @else
                <img src="assets/partner/pbcfyi_display.jpg" class="img-responsive" alt="Partner Stationery Items">
            @endif
            <div class="caption">
                <h3> Combo FYI Pads & BCs </h3><br>
                <p class="description text-muted">{!! nl2br($product[5]->description) !!}</p>
                    <p><a href="{!! url("/categories/12") !!}" class="btn btn-primary btn-block" role="button"> Select Combo FYI Pads & BCs </a></p>
            </div>
        </div>
    </div>

</div> 
@endsection