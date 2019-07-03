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
     // dd($request->prod_name)
@endphp

{{-- ////////////////// Name Tag //////////////// --}}
@if ($request->prod_id == 112)
<div class="nt_background">
    <div class="nt_name">
        {!! $request->name ?: '&nbsp;' !!}
    </div>
</div> {{-- close background class --}}
@endif

{{-- ////////////////// Business Card //////////////// --}}
    @if ($request->prod_id == 101 || $request->prod_id == 102 || $request->prod_id == 103 || $request->prod_name == "Staff Business Card" || $request->prod_name == "Associate Business Card" || $request->prod_name == "Partner Business Card")
        <div class="bc_background">
       <div class="bc_name">
            {!! $request->name ?: '&nbsp;' !!}
        </div>
        <div class="bc_title">
            {!! $request->title ?: '&nbsp;' !!}
        </div>
        @if ($request->address2)
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
{{--     @php
    dd($request->prod_name);
@endphp --}}
{{-- ////////////////// Double sided Business Card //////////////// --}}
    @if ($request->prod_id == 110 || $request->prod_id == 111 || $request->prod_name == 'Partner Double Sided BC' || $request->prod_name == 'Associate Double Sided BC' )
        <div class="dsbc_background">
       <div class="dsbcf_name">
            {!! $request->name ?: '&nbsp;' !!}
        </div>
        <div class="dsbcf_title">
            {!! $request->title ?: '&nbsp;' !!}
        </div>

        {{-- @php
            dd($request->address2)
        @endphp --}}
        @if (!$request->address2)
            <div class="dsbcf_address_line1">
                {{ $HKName }}
            </div>
        @else
            <div class="dsbcf_address_line1_1">
                {{ $HKName }}
            </div>
        @endif

        <div class="dsbcf_address_line2">
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
        <div class="dsbcf_email">
            {{ strtolower($HKEmail) }}
        </div>

        <div class="dsbcb_name">
            {!! $request->name2 ?: '&nbsp;' !!}
        </div>

        <div class="dsbcb_title">
            {!! $request->title2 ?: '&nbsp;' !!}
        </div>
        @if (!$request->address2b)
            <div class="dsbcb_address_line1">
                {{ $HKName }}
            </div>
        @else
            <div class="dsbcb_address_line1_1">
                {{ $HKName }}
            </div>
        @endif
        <div class="dsbcb_address_line2">
            @if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK46')
                @if ($request->address2b)
                    {{ $request->address1b }} <br> {{ $request->address2b }} <br> {{ $request->city2 }} {{ $request->state2 }} {{ $request->zip2 }}
                @else
                    {{ $request->address1b }} <br> {{ $request->city2 }} {{ $request->state2 }} {{ $request->zip2 }}
                @endif
            @elseif (Auth::user()->username == 'HK35')
                @if ($request->address2b)
                    {{ $request->address1b }} <br> {{ $request->address2b }} <br> {{ $request->city2 }}, {{ $request->state2 }}, {{ $request->zip2 }}
                @else
                    {{ $request->address1b }} <br> {{ $request->city2 }}, {{ $request->state2 }}, {{ $request->zip2 }}
                @endif
            @else
                @if ($request->address2b)
                    {{ $request->address1b }} <br> {{ $request->address2b }} <br> {{ $request->city2 }}, {{ $request->state2 }} {{ $request->zip2 }}
                @else
                    {{ $request->address1b }} <br> {{ $request->city2 }}, {{ $request->state2 }} {{ $request->zip2 }}
                @endif
            @endif
            <br>

            @if ($phone2 != null)
                {{ $phone2 }} <br>
            @endif

        </div>
        <div class="dsbcb_email">
            {{ strtolower($HKEmail2) }}
        </div>
    </div> {{-- close background class --}}
    @endif


{{-- //////////////////// FYI Pads /////////////////// --}}
    @if ($request->prod_id == 107 || $request->prod_id == 108 || $request->prod_id == 109 || $request->prod_name == "Staff FYI Pads" || $request->prod_name == "Associate FYI Pads" || $request->prod_name == "Partner FYI Pads")
    <div class="fyi_background">
       <div class="fyi_name">
            {!! $request->name ?: '&nbsp;' !!}
        </div>

        @if ($request->address2)
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
                    {{ $request->address1 }} <br> {{ $request->address2 }} <br> {{ $request->city }}  {{ $request->state }} {{ $request->zip }}
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
    </div>
        </div>
    @endif

        {{-- //////////////////// Combo BC FYI Pads /////////////////// --}}
    @if ($request->prod_id == 104 || $request->prod_id == 105 || $request->prod_id == 106 || $request->prod_name == "Staff BC + FYI Pads" || $request->prod_name == "Associate BC + FYI Pads" || $request->prod_name == "Partner BC + FYI Pads")
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
@php
    // dd($request);
@endphp
{!! Session::put('qty', $request->qty) !!}

{!! Session::put('name', $request->name) !!}
{!! Session::put('title', $request->title) !!}
{!! Session::put('email', strtolower($HKEmail)) !!}
{!! Session::put('address1', $request->address1) !!}
{!! Session::put('address2', $request->address2) !!}
{!! Session::put('city', $request->city) !!}
{!! Session::put('state', $request->state) !!}
{!! Session::put('zip', $request->zip) !!}
{!! Session::put('phone', $request->phone) !!}
{!! Session::put('fax', $request->fax) !!}
{!! Session::put('cell', $request->cell) !!}

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
{!! Session::put('prod_layout', Session::get('prod_layout')) !!}


</body>
</html>
