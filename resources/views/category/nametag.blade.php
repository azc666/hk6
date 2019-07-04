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
    </div>

    <div class="row body-background">
        <div class="col-sm-3 col-md-4">
            <br>
            <div class="thumbnail">

                <img src="assets/nametag/ntag.jpg" class="img-responsive" alt="Name Tags">

                <div class="caption">
                    <h3> Name Tags </h3><br>

                    <p class="description text-muted">{!! nl2br($product[11]->description) !!}</p>
                    <p>
                        <a href="{!! url("/categories/15") !!}" class="btn btn-primary btn-block" role="button"> Select
                            Name Tags </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endsection
