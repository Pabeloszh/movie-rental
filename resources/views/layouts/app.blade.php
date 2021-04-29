<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/4ce82acadb.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>MovieRental</title>
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#"><i class="fas fa-film"></i>MovieRental</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarText">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link  @if (stripos($_SERVER['REQUEST_URI'], 'mymovies' )!==false) active @endif" aria-current="page" href="{{route('mymovies')}}">Movies</a>
                    </li>
                    @auth
                    @if(auth()->user()->admin === true)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  @if (stripos($_SERVER['REQUEST_URI'], 'admin' )!==false) active @endif" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('adminusers')}}">Users</a></li>
                            <li><a class="dropdown-item" href="{{route('adminmovies')}}">Movies</a></li>
                            <li><a class="dropdown-item" href="{{route('adminrents')}}">Rents</a></li>
                        </ul>
                    </li>
                    @endif
                    @endauth
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    @guest
                    <li class="nav-item">
                    <a class="nav-link active fw-bold" aria-current="page" href="{{route('register')}}">Register</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active fw-bold" href="{{route('login')}}">Login</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{route('update')}}"><i class="fas fa-user"></i>&nbsp;{{auth()->user()->name}}</a>
                    </li>
                    <form action={{route('logout')}} method="post" class="nav-item">
                        @csrf
                        <button class="nav-link btn btn-link fw-bold" type="submit"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</button>
                    </form>
                    @endauth
                </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <footer class="bg-light">
            <small>
            <div class="container py-3">
                <div class="row">
                    <div class="col-sm-12 col-lg-4 p-3 d-none d-lg-block">
                        <h5 class="text-primary">About us</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum iure delectus aliquid vel nisi ea consequuntur, voluptates, molestias eaque asperiores explicabo nemo exercitationem facilis voluptate earum architecto ullam autem doloremque.</p>
                    </div>
                    <div class="col-sm-12 col-lg-4 p-3 d-none d-lg-block">
                        <h5 class="text-primary">Useless List</h5>
                        <ul>
                            <li>It's</li>
                            <li>Just</li>
                            <li>A Useless</li>
                            <li>Filler</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-lg-4 p-3">
                        <h5 class="text-primary">Contact us</h5>
                        <p>+48 123 456 789<br/>movierents@gmail.com</p>
                    </div>
                </div>
            </div>
            </small>
        </footer>
        <footer class="bg-primary d-flex justify-content-center py-1">
            <p class="text-white m-0"><small>&#xA9; Copyright 2021</small></p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            $(window).on('load', function() {
            $('#staticBackdrop').modal('show');
        });
    </script>
    </body>
</html>
