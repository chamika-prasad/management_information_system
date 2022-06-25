<!DOCTYPE html>
<html>
    <head>
        <title>Buddha's Way Dhamma School</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style type="text/css">
            @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

            body{
                margin:0;
                font-size:.9rem;
                font-weight:400;
                line-height:2;
                color:#212529;
                text-align:center;
                background-color:#d7bea5;
            }
            .navbar-laravel
            {
                box-shadow: 0 2px 4px rgba(0,0,0,.4);
            }
            .navbar-brand, .nav-link, .my-form, .login-form
            {
                font-family: Raleway,sans-serif;
            }
            .my_form
            {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }
            .my-form .row 
            {
                margin-left: 0;
                margin-right: 0;
            }
            .login-form
            {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }
            .login-form .row 
            {
                margin-left: 0;
                margin-right: 0;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">homelaravel</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-labeL="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class=navbar-nav ml-auto>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('abc') }}">Register</a>
        </li>
        <li class="nav-item">
                    <a class="nav-link" href="{{route('index') }}">Login</a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout')}}">Logout</a>
        </li>
        @endguest
                </ul>

        </div>
        </div>
        </nav>
        @yield('content')
        </body>
        <html>