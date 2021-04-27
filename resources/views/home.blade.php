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

    @auth
    @if(App\Models\Rent::select('movie_id')->where('user_id', auth()->user()->id)->where('deleted_at', null)->whereMonth('updated_at', '<',  Carbon\Carbon::today()->subMonths(1))->get()->count() !== 0)
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">You have overdued movies</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                One month trial expired for one of your rented movies, please give them back!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">I'll do it later</button>
                <a href="{{route('mymovies')}}" type="button" class="btn btn-primary">See your overdued movies</a>
            </div>
            </div>
        </div>
    </div>
    @endif
    @endauth
    
@endsection