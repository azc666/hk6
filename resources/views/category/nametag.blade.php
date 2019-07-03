@extends('layouts/main')

@section('title')
  Nametag
@endsection

@section('content')

{{-- <br> --}}
<div class="container">
<div class="row">
  <h2 class="pull-left move-up"> Select a Name Tag </h2>
  <a href="{{ url("/") }}" class="btn btn-primary pull-right" role="button">Return to Select a Category Page</a>
  {{-- </div> --}}
</div>

<div class="row body-background">

    <div class="col-sm-3 col-md-4">
        <br>
        <div class="thumbnail">

                <img src="assets/nametag/image001.jpg" class="img-responsive" alt="Name Tags">

            <div class="caption">
                <h3> Name Tags </h3><br>

                <p class="description text-muted">{!! nl2br($product[11]->description) !!}</p>
                    <p>
                        <a href="{!! url("/categories/15") !!}" class="btn btn-primary btn-block" role="button"> Select Name Tags </a>
                    </p>
            </div>
        </div>
    </div>

    {{-- <div class="col-sm-4 col-md-4">
        <br>
        <div class="thumbnail">
            @if (Auth::user()->username == 'HK35')
                <img src="assets/staff/mexico_sfyi_display.jpg" class="img-responsive" alt="Staff Stationery Items">
            @elseif (Auth::user()->username == 'HK34')
                <img src="assets/staff/bogota_sfyi_display.jpg" class="img-responsive" alt="Staff Stationery Items">
            @elseif (Auth::user()->username == 'HK46')
                <img src="assets/staff/london_sfyi_display.jpg" class="img-responsive" alt="Staff Stationery Items">
            @else
                <img src="assets/staff/sfyi_display.jpg" class="img-responsive" alt="Staff Stationery Items">
            @endif
            <div class="caption">
                <h3> FYI Pads </h3><br>
                <p class="description text-muted">{!! nl2br($product[6]->description) !!}</p>
                    <p>
                        <a href="{!! url("/categories/5") !!}" class="btn btn-primary btn-block" role="button"> Select FYI Pads </a>
                    </p>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-sm-4 col-md-4">
        <br>
        <div class="thumbnail">
            @if (Auth::user()->username == 'HK35')
                <img src="assets/staff/mexico_sbcfyi_display.jpg" class="img-responsive" alt="Staff Stationery Items">
            @elseif (Auth::user()->username == 'HK34')
                <img src="assets/staff/bogota_sbcfyi_display.jpg" class="img-responsive" alt="Staff Stationery Items">
            @elseif (Auth::user()->username == 'HK46')
                <img src="assets/staff/london_sbcfyi_display.jpg" class="img-responsive" alt="Staff Stationery Items">
            @else
                <img src="assets/staff/sbcfyi_display.jpg" class="img-responsive" alt="Staff Stationery Items">
            @endif
            <div class="caption">
                <h3> Combo FYI Pads & BCs </h3><br>
                <p class="description text-muted">{!! nl2br($product[3]->description) !!}</p>
                    <p>
                        <a href="{!! url("/categories/6") !!}" class="btn btn-primary btn-block" role="button"> Select Combo FYI Pads & BCs </a>
                    </p>
            </div>
        </div>
    </div> --}}

</div>
@endsection
