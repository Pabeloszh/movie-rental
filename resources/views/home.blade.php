@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 mx-auto px-4 py-3 rounded">
        <div class="mb-5">
            <h3>Search movie</h3>
            <form class="d-flex my-3" action="{{route('home')}}" method="get">
                <input class="form-control" value="{{request()->query('search')}}" type="text" name="search" id="search" placeholder="Search movie...">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </form>
            <div class="d-flex">
            @foreach($movies as $movie)
                {{-- <x-post :movie_rec="$movie_rec"/> --}}
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$movie->title}}</h5>
                        <h6 class="card-subtitle mb-1 text-muted">{{$movie->genre}} {{$movie->premiere}}</h6>
                        <p class="mb-3 text-muted">{{$movie->director}}</p>
                        <p class="card-text">{{$movie->desc}}</p>
                        <a href="#" class="card-link">Read more</a>
                        @auth
                        <a href="#" class="btn btn-primary">Rent movie</a>
                        @endauth
                    </div>
                </div>
            @endforeach
            @if(!$movies)
                <p class="px-1">Sorry, we cant find this film, director or genre...</p>
            @endif
            </div>
        </div>
        <div>
            <h3>Recently Added Movies</h3>
            @if($movies_rec->count())
                <div class="d-flex my-3">
                @foreach($movies_rec as $movie_rec)
                    {{-- <x-post :movie_rec="$movie_rec"/> --}}
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$movie_rec->title}}</h5>
                            <h6 class="card-subtitle mb-1 text-muted">{{$movie_rec->genre}} {{$movie_rec->premiere}}</h6>
                            <p class="mb-3 text-muted">{{$movie_rec->director}}</p>
                            <p class="card-text">{{$movie_rec->desc}}</p>
                            <a href="#" class="card-link">Read more</a>
                            @auth
                            <a href="#" class="btn btn-primary">Rent movie</a>
                            @endauth
                        </div>
                    </div>
                @endforeach

                {{-- {{$posts->links()}} --}}
                </div>
            @else
                <p>There are no movies</p>
            @endif
        </div>
    </div>
@endsection