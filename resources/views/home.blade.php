@extends('layouts/main')

@section('title')
  HK Order Portal Home
@endsection

@section('content')

    <div class="container"> 

    @if (!empty($success))
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $success }}
        </div>
    @endif

        <div class="row body-background">
            <div class="col-md-8">
             <h2 class="page_head"><img src="assets/HKheader2.png" class="move-down img-responsive" alt=""></h2>
             
             @if(Auth::check() == false)
                <br>
                @include('partials/_carousel')
                <br>
            @endif
    {{-- <br> --}}

    <h3 class="text-muted text-center"> {{ Auth::check() ? 'Select a Category' : 'Login to Select a Product'}} </h3>
    <br>

    <div class="row">

        @if (Auth::check()) 
            {{-- <div class="col-md-12">   
                @include('partials/_carousel-products')
            </div>
        @else   --}}  

        @if (Auth::check())
            <div class="col-md-6">
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
                    <div class="caption text-center">
                        <a
                           href="{{ Auth::check() ? url('/partner') : '#'}}">
                            <h4>Partner Stationery Items</h4>
                        </a>
                    </div>
                </div>
            </div>
        @endif

        @if (Auth::check())
            <div class="col-md-6">
                <div class="thumbnail">
                    @if (Auth::user()->username == 'HK35')
                        <img src="assets/associate/mexico_abcfyi_display.jpg" class="img-responsive" alt="Associate Stationery Items">
                    @elseif (Auth::user()->username == 'HK34')
                        <img src="assets/associate/bogota_abcfyi_display.jpg" class="img-responsive" alt="Associate Stationery Items">
                    @elseif (Auth::user()->username == 'HK46')
                        <img src="assets/associate/london_abcfyi_display.jpg" class="img-responsive" alt="Associate Stationery Items">
                    @else  
                      <img src="assets/associate/abcfyi_display.jpg" class="img-responsive" alt="Associate Stationery Items">
                    @endif  
                    <div class="caption text-center">
                        <a
                           href="{{ Auth::check() ? url('/associate') : '#'}}">
                            <h4>Associate Stationery Items</h4>
                        </a>
                    </div>
                </div>
            </div>
        @endif

        @if (Auth::check())
            <div class="col-md-6">
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
                    <div class="caption text-center">
                        <a
                           href="{{ Auth::check() ? url('/staff') : '#'}}">
                            <h4>Staff Stationery Items</h4>
                        </a>
                    </div>
                </div>
            </div>
        @endif
@endif
            
    </div>
    
         </div>

         <br>
        <div class="col-md-4 aside">
            @if (!Auth::check())
                <h3>Log In</h3>
                @include('partials/_login') 
            @else
                <div class="widget text-muted">
                    <h4> {{ Auth::user()->loc_name }} </h4>
                    <div class="inner">
                        {{ Auth::user()->username }}<br>
                        @if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK46')
                            @if (Auth::user()->loc_address2)
                                {{ Auth::user()->loc_address1 }}<br>
                                {{ Auth::user()->loc_address2 }}<br>
                                {{ Auth::user()->loc_city }} {{ Auth::user()->loc_state }} {{ Auth::user()->loc_zip }}<br>
                            @else
                                 {{ Auth::user()->loc_address1 }}<br>
                                 {{ Auth::user()->loc_city }} {{ Auth::user()->loc_state }} {{ Auth::user()->loc_zip }}<br>
                            @endif
                        @elseif (Auth::user()->username == 'HK35')
                            @if (Auth::user()->loc_address2)
                                {{ Auth::user()->loc_address1 }}<br>
                                {{ Auth::user()->loc_address2 }}<br>
                                {{ Auth::user()->loc_city }}, {{ Auth::user()->loc_state }}, {{ Auth::user()->loc_zip }}<br>
                            @else
                                 {{ Auth::user()->loc_address1 }}<br>
                                 {{ Auth::user()->loc_city }}, {{ Auth::user()->loc_state }}, {{ Auth::user()->loc_zip }}<br>
                            @endif
                        @else
                            @if (Auth::user()->loc_address2)
                                {{ Auth::user()->loc_address1 }}<br>
                                {{ Auth::user()->loc_address2 }}<br>
                                {{ Auth::user()->loc_city }}, {{ Auth::user()->loc_state }} {{ Auth::user()->loc_zip }}<br>
                            @else
                                 {{ Auth::user()->loc_address1 }}<br>
                                 {{ Auth::user()->loc_city }}, {{ Auth::user()->loc_state }} {{ Auth::user()->loc_zip }}<br>
                            @endif
                        @endif
                    </div>
                </div> 
                <div class="widget text-muted">
                    <h4> Administrative Contact Info </h4>
                    <div class="inner">
                        Contact: {{ Auth::user()->contact_a }}<br>
                        Email: {{ Auth::user()->email }} <br>
                        Phone: {{ Auth::user()->phone_a }}<br>
                        Fax: {{ Auth::user()->fax_a }}<br>
                        Cell: {{ Auth::user()->cell_a }}<br>
                    </div>
                </div>
                <div class="widget text-muted">
                    <h4> Billing Contact Info </h4>
                    <div class="inner">
                        Contact: {{ Auth::user()->contact_b }}<br>
                        Email: {{ Auth::user()->email_b }} <br>
                        Phone: {{ Auth::user()->phone_b }}<br>
                        Fax: {{ Auth::user()->fax_b }}<br>
                        Cell: {{ Auth::user()->cell_b }}<br>
                    </div>
                </div>
                <div class="widget text-muted">
                    <h4> Shipping Contact Info </h4>
                    <div class="inner">
                        Contact: {{ Auth::user()->contact_s }}<br>
                        Email: {{ Auth::user()->email_s }} <br>
                        Phone: {{ Auth::user()->phone_s }}<br>
                        Fax: {{ Auth::user()->fax_s }}<br>
                        Cell: {{ Auth::user()->cell_s }}<br>
                    </div>
                  </div>  
                <div class="widget text-muted">
                    <h4> Shipping Location </h4>
                    <div class="inner">
                        {{ Auth::user()->loc_name }} <br>  
                        @if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK46')
                            @if (Auth::user()->loc_address2)
                                {{ Auth::user()->loc_address1 }}<br>
                                {{ Auth::user()->loc_address2 }}<br>
                                {{ Auth::user()->loc_city }} {{ Auth::user()->loc_state }} {{ Auth::user()->loc_zip }}<br>
                            @else
                                 {{ Auth::user()->loc_address1 }}<br>
                                 {{ Auth::user()->loc_city }} {{ Auth::user()->loc_state }} {{ Auth::user()->loc_zip }}<br>
                            @endif
                        @elseif (Auth::user()->username == 'HK35')
                            @if (Auth::user()->loc_address2)
                                {{ Auth::user()->loc_address1 }}<br>
                                {{ Auth::user()->loc_address2 }}<br>
                                {{ Auth::user()->loc_city }}, {{ Auth::user()->loc_state }}, {{ Auth::user()->loc_zip }}<br>
                            @else
                                 {{ Auth::user()->loc_address1 }}<br>
                                 {{ Auth::user()->loc_city }}, {{ Auth::user()->loc_state }}, {{ Auth::user()->loc_zip }}<br>
                            @endif
                        @else
                            @if (Auth::user()->loc_address2)
                                {{ Auth::user()->loc_address1 }}<br>
                                {{ Auth::user()->loc_address2 }}<br>
                                {{ Auth::user()->loc_city }}, {{ Auth::user()->loc_state }} {{ Auth::user()->loc_zip }}<br>
                            @else
                                 {{ Auth::user()->loc_address1 }}<br>
                                 {{ Auth::user()->loc_city }}, {{ Auth::user()->loc_state }} {{ Auth::user()->loc_zip }}<br>
                            @endif
                        @endif
                    </div>
                </div>         
            @endif
        </div>
    </div>

@endsection

</div>