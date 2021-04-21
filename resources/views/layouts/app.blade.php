<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>MovieRental</title>
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">MovieRental</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    @guest
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('register')}}">Register</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('update')}}">{{auth()->user()->name}}</a>
                    </li>
                    <form action={{route('logout')}} method="post" class="nav-item">
                        @csrf
                        <button class="nav-link" type="submit">Logout</button>
                    </form>
                    @endauth
                </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        footer
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>
