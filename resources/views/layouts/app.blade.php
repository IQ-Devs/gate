<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gate Iraq</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">




    <!-- Styles -->
{{--     <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
{{--<nav class="navbar navbar-default navbar-static-top">--}}
{{--    <div class="container">--}}
{{--        <div class="navbar-header">--}}

{{--            <!-- Collapsed Hamburger -->--}}
{{--            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">--}}
{{--                <span class="sr-only">Toggle Navigation</span>--}}
{{--                <span class="icon-bar"></span>--}}
{{--                <span class="icon-bar"></span>--}}
{{--                <span class="icon-bar"></span>--}}
{{--            </button>--}}

{{--            <!-- Branding Image -->--}}
{{--            <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                Gate Iraq--}}
{{--            </a>--}}
{{--        </div>--}}

{{--        <div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
{{--            <!-- Left Side Of Navbar -->--}}
{{--            <ul class="nav navbar-nav">--}}
{{--                 @if (Auth::check())--}}
{{--                <li><a href="{{ url('/home') }}">Home</a></li>--}}
{{--                <li><a href="{{ url('/profile') }}">Profile</a></li>--}}

{{--                @endif--}}

{{--                @can('is-admin')--}}
{{--                        <li><a href="{{ url('/admin') }}">Admin</a></li>--}}
{{--                @endcan--}}

{{--            </ul>--}}

{{--            <!-- Right Side Of Navbar -->--}}
{{--            <ul class="nav navbar-nav navbar-right">--}}
{{--                <!-- Authentication Links -->--}}
{{--                @if (Auth::guest())--}}
{{--                    <li><a href="{{ url('/login') }}">Login</a></li>--}}
{{--                    <li><a href="{{ url('/register') }}">Register</a></li>--}}
{{--                @else--}}
{{--                    <li class="dropdown">--}}
{{--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
{{--                            {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                        </a>--}}

{{--                        <ul class="dropdown-menu" role="menu">--}}
{{--                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                @endif--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
<!--Navbar -->

<nav class="mb-1 navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container mb-1">

    <a class="navbar-brand " style="
    font-family: Kaushan Script,Helvetica Neue,Helvetica,Arial,cursive;
"href="{{ url('/') }}">GateIraq</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
            @if (Auth::check())
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('/home') }}    ">Home
                </a>
            </li>
                <li class="nav-item ">
                <a class="nav-link" href="{{ url('/profile') }}    ">Profile
                </a>
            </li>
                @can('is-admin')
                    <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/admin') }}    ">Admin
                    </a>
                </li>
                @endcan

                @endif


        </ul>
        <ul class="navbar-nav ml-auto ">
            @if (Auth::guest())
                                <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                                <li class="nav-item"><a  class="nav-link" href="{{ url('/register') }}">Register</a></li>
                            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                                            {{ Auth::user()->name }}
                                        </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="#">My account</a>
                        <a class="dropdown-item" href="{{ url('/logout') }}">Log out</a>
                    </div>
                </li>
            @endif



        </ul>
    </div>
   </div>
</nav>
<!--/.Navbar -->
@yield('content')
<!--Start of Tawk.to Script-->

<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5fb6a6e3920fc91564c8aeb0/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
