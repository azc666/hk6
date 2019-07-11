<!DOCTYPE html>
<html>
<head>
    <title></title>
{!! Html::style('css/mpdfstyle.css') !!}
</head>
<body>

<div class="container">
    <div class="row">

@php
Session::put('phone', $request->phone);
Session::put('fax', $request->fax);
Session::put('cell', $request->cell);
@endphp

{{-- ////////////////// Name Tag //////////////// --}}
@if ($request->id == 112)
    <div class="nt_background">
        @if (strlen($request->name) <= 15)
            <div class="nt_name">
                {!! $request->name ?: '&nbsp;' !!}
            </div>
        @else
            <div class="nt_name2">
                {!! $request->name ?: '&nbsp;' !!}
            </div>
        @endif
    </div> {{-- close background class --}}
@endif

{{-- ////////////////// Business Card //////////////// --}}
    @if ($request->id == 101 || $request->id == 102 || $request->id == 103)
        <div class="bc_background">
        <div class="bc_name">
            {!! $request->name ?: '&nbsp;' !!}
        </div>
        <div class="bc_title">
            {!! $request->title ?: '&nbsp;' !!}
        </div>
        @if ($request->address2 && $request->email && $phone != null)
            <div class="bc_address_line1">
                {{ $HKName }}
            </div>
        @else
            <div class="bc_address_line1_1">
                {{ $HKName }}
            </div>
        @endif
        <div class="bc_address_line2">
            @if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK46')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @endif
            @elseif (Auth::user()->username == 'HK35')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @endif
            @else
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @endif
            @endif
            <br>
            @if ($phone != null)
                {{ $phone }} <br>
            @endif

        </div>
        <div class="bc_email">
            {{ strtolower($HKEmail) }}
        </div>
    </div> {{-- close background class --}}
    @endif

{{-- ////////////// Double Sided Business Card //////////// --}}
    @if ($request->id == 110 || $request->id == 111)
        <div class="dsbc_background">
        <div class="dsbc_name">
            {!! $request->name ?: '&nbsp;' !!}
        </div>
        <div class="dsbc_name2">
            {!! $request->name ?: '&nbsp;' !!}
        </div>
        <div class="dsbc_title">
            {!! $request->title ?: '&nbsp;' !!}
        </div>
        <div class="dsbc_title2">
            {!! $request->title2 ?: '&nbsp;' !!}
        </div>



        @if ($request->address2 && $request->email && $phone != null)
            <div class="bc_address_line1">
                {{ $HKName }}
            </div>
        @else
            <div class="bc_address_line1_1">
                {{ $HKName }}
            </div>
        @endif
        <div class="bc_address_line2">
            @if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK46')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @endif
            @elseif (Auth::user()->username == 'HK35')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @endif
            @else
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @endif
            @endif
            <br>
            @if ($phone != null)
                {{ $phone }} <br>
            @endif

        </div>
        <div class="bc_email">
            {{ strtolower($HKEmail) }}
        </div>
    </div> {{-- close background class --}}
    @endif


{{-- //////////////////// FYI Pads /////////////////// --}}
    @if ($request->id == 107 || $request->id == 108 || $request->id == 109)
    <div class="fyi_background">
        <div class="fyi_name">
            {!! $request->name ?: '&nbsp;' !!}
        </div>
        {{-- <div class="fyi_title">
            {!! $request->title ?: '<br>' !!}
        </div> --}}
        @if ($request->address2 && $request->email && $phone != null)
            <div class="fyi_address_line1">
                {{ $HKName }}
            </div>
        @else
            <div class="fyi_address_line1_1">
                {{ $HKName }}
            </div>
        @endif
        <div class="fyi_address_line2">
            @if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK46')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @endif
            @elseif (Auth::user()->username == 'HK35')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @endif
            @else
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @endif
            @endif
            <br>
            @if ($phone != null)
                {{ $phone }} <br>
            @endif
        </div>
        <div class="fyi_email">
            {{ strtolower($HKEmail) }}
        </div>
    </div>  {{-- close backgound --}}
        </div> {{-- close <div class="row"> --}}
    @endif

    {{-- //////////////////// Combo BC FYI Pads /////////////////// --}}
    @if ($request->id == 104 || $request->id == 105 || $request->id == 106)
    <div class="bcfyi_background">
       <div class="bcfyi_bc_name">
            {{ $request->name ?: '&nbsp;' }}
        </div>
        <div class="bcfyi_bc_title">
            {!! $request->title ?: '&nbsp;' !!}
        </div>
        @if ($request->address2 && $request->email && $phone != null)
            <div class="bcfyi_bc_address_line1">
                {{ $HKName }}
            </div>
        @else
            <div class="bcfyi_bc_address_line1_1">
                {{ $HKName }}
            </div>
        @endif
        <div class="bcfyi_bc_address_line2">
            @if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK46')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @endif
            @elseif (Auth::user()->username == 'HK35')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @endif
            @else
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @endif
            @endif
            <br>
            @if ($phone != null)
                {{ $phone }} <br>
            @endif
        </div>
        <div class="bcfyi_bc_email">
            {{ strtolower($HKEmail) }}
        </div>

       <div class="bcfyi_fyi_name">
            {!! $request->name ?: '&nbsp;' !!}
        </div>
        {{-- <div class="fyi_title">
            {!! $request->title ?: '<br>' !!}
        </div> --}}

        @if ($request->address2 && $request->email && $phone != null)
            <div class="bcfyi_fyi_address_line1">
                {{ $HKName }}
            </div>
        @else
            <div class="bcfyi_fyi_address_line1_1">
                {{ $HKName }}
            </div>
        @endif
        <div class="bcfyi_fyi_address_line2">
            @if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK46')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }} {{ $request->state }} {{ $request->zip }}
                @endif
            @elseif (Auth::user()->username == 'HK35')
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }}, {{ $request->zip }}
                @endif
            @else
                @if ($request->address2)
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @else
                    {{ $request->address1 }} <br> {{ $request->city }}, {{ $request->state }} {{ $request->zip }}
                @endif
            @endif
            <br>
            @if ($phone != null)
                {{ $phone }} <br>
            @endif
        </div>
        <div class="bcfyi_fyi_email">
            {{ strtolower($HKEmail) }}
        </div>
    {{-- </div> --}}  {{-- close backgound --}}
    {{-- </div> --}} {{-- close <div class="row"> --}}
    @endif

    </div> {{-- close row --}}
</div>  {{-- close container --}}

{!! Session::put('qty', $request->qty) !!}
{!! Session::put('name', $request->name) !!}
{!! Session::put('title', $request->title) !!}
{!! Session::put('email', strtolower($HKEmail)) !!}
{!! Session::put('address1', $request->address1) !!}
{!! Session::put('address2', $request->address2) !!}
{!! Session::put('city', $request->city) !!}
{!! Session::put('state', $request->state) !!}
{!! Session::put('zip', $request->zip) !!}

{!! Session::put('name2', $request->name2) !!}
{!! Session::put('title2', $request->title2) !!}
{!! Session::put('email2', strtolower($HKEmail2)) !!}
{!! Session::put('address1b', $request->address1b) !!}
{!! Session::put('address2b', $request->address2b) !!}
{!! Session::put('city2', $request->city2) !!}
{!! Session::put('state2', $request->state2) !!}
{!! Session::put('zip2', $request->zip2) !!}
{!! Session::put('phone2', $request->phone2) !!}
{!! Session::put('fax2', $request->fax2) !!}
{!! Session::put('cell2', $request->cell2) !!}

{!! Session::put('specialInstructions', $request->specialInstructions) !!}
{!! Session::put('prod_name', $request->prod_name) !!}
{!! Session::put('prod_description', $request->prod_description) !!}
{!! Session::put('imagePath', $request->imagePath) !!}

</body>
</html>
