 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="{{ url('/') }}">
      <img src="{{ URL::asset('assets/HK.png') }}" class="move-down" style="max-width:60px" alt="">
      </a>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" style="font-size:16px; text-align: center">
        <li class="active"><a href="{{ url('/') }}"> Home <span class="sr-only"></span></a></li>
        
        {{-- <li><a href="{{ url('/support') }}">Support </a></li> --}}
        {{-- <li><a href="{{ url('/logout') }}">Log Out </a></li> --}}
      
@if (Auth::user())
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Support<span class="caret"></span></a>       
    <ul class="dropdown-menu" role="menu">
      <li><a href="{{ route('showContactus') }}"><i class="fa fa-info-circle" aria-hidden="true" style="font-size:16px"></i>&nbsp;&nbsp;Contact Us</a></li>
      {{-- <li><a href="#">Another action</a></li> --}}
      {{-- <li><a href="#">Something else here</a></li> --}}
      <li class="divider"></li>
      <li><a href="{{ asset('/assets/HK Order Portal User Manual 2018.pdf') }}" target="_blank"><i class="fa fa-book" aria-hidden="true" style="font-size:16px"></i>&nbsp;&nbsp;Order Portal Documentation</a></li>
    </ul>                
  </li>
@endif

@if (Auth::user() && Auth::user()->admin == 1)
  {{-- expr --}}

  
  <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin<span class="caret"></span></a>       
        <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('register') }}">Create a new user</a></li>
                {{-- <li><a href="#">Another action</a></li> --}}
                {{-- <li><a href="#">Something else here</a></li> --}}
                <li class="divider"></li>
                <li><a href="{{ route('login') }}">Login as another user</a></li>
                <li class="divider"></li>
                <li><a href="{{ route('titles') }}">Titles Maintenance</a></li>
              </ul>                
            </li>
@endif
      </ul>

      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())       
        
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="/assets/carticon/ShoppingCart{{ Cart::content()->count() }}.gif" style="max-width:35px;">&nbsp;<span style="line-height:25px"> My Cart</span><span class="caret"></span></a>

            {{-- <i class="fa fa-user" aria-hidden="true" style="font-size:24px"></i>My  --}}
            <ul class="dropdown-menu">
              <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size:16px"></i>&nbsp;&nbsp;Show Cart </span></a></li>
              {{-- @if (Cart::content()->count()) --}}
                <li role="separator" class="divider"></li>
              <li><a href="{{ route('storecart') }}"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size:18px"></i>&nbsp;&nbsp;Save Cart</a></li>
              <li><a href="{{ route('restorecart') }}"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="font-size:18px"></i>&nbsp;&nbsp;Restore Cart</a></li>
              {{-- @endif --}}
              
            </ul>
          </li>
        
        {{-- <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Cart <strong>({{ Cart::count() }})</strong></a></li> --}}
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true" style="font-size:24px"></i> {{ Auth::user()->loc_name }}<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="text-center"> Username: {{ Auth::user()->username}} </li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('showProfile') }}">My Profile</a></li>
            <li><a href="{{ route('changePassword') }}">Change Password</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('myorders') }}">My Orders</a></li>
            <li role="separator" class="divider"></li>
          <li>
              <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
        @endif
  
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>