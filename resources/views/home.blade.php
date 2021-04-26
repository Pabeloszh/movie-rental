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
            @if($movies->count())
                @foreach($movies as $movie)
                    <x-movie :movie="$movie"/>
                @endforeach
            @endif
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
                    <x-movie :movie="$movie_rec"/>
                @endforeach

                {{-- {{$posts->links()}} --}}
                </div>
            @else
                <p>There are no movies</p>
            @endif
        </div>
        <div>
            <h3>Mostly Rented Movies</h3>
            @if($movies_top->count())
                <div class="d-flex my-3">
               @foreach($movies_top as $movie_top)
                    <x-movie :movie="$movie_top"/>
                @endforeach

                {{-- {{$posts->links()}} --}}
                </div>
            @else
                <p>There are no movies</p>
            @endif
        </div>
    </div>
@endsection