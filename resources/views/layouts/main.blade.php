<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title')
    </title>
    <br>
    @include('partials/_head')
    @yield('extra-css')
</head>

<body>
    
    <div class="container">
        <div class="row">
            @include('partials/_navbar')
        </div>
    </div>

    @yield('content')
    @include('partials/_footer')
    @include('partials/_javascripts')
    @yield('extra-js')

</body>

</html>