@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 mx-auto mb-4 px-4 py-3 rounded">
        <div class="mb-5">
            <form class="d-flex my-3" action="{{route('home')}}" method="get">
                <input class="form-control" value="{{request()->query('search')}}" type="text" name="search" id="search" placeholder="Title / Director / Genre">
                <button type="submit" class="btn-primary border-0 rounded-end px-3"><i class="fas fa-search"></i></button>
            </form>
            <div class="container p-0">
                <div class="row">
                @if($movies->count() > 0)
                    @foreach($movies as $movie)
                        <x-movie :movie="$movie"/>
                    @endforeach
                @else
                    <p class="px-1">Sorry, we cant find this film, director or genre...</p>
                @endif
                </div>
            </div>
        </div>
        <div class="mb-5">
            <h3 class="mb-3">Recently Added Movies</h3>
            @if($movies_rec->count())
                <div class="container">
                    <div class="row">
                        @foreach($movies_rec as $movie_rec)
                            <x-movie :movie="$movie_rec"/>
                        @endforeach
                    </div>
                {{-- {{$posts->links()}} --}}
                </div>
            @else
                <p>There are no movies</p>
            @endif
        </div>
        <div>
            <h3 class="mb-3">Mostly Rented Movies</h3>
            @if($movies_top->count())
                <div class="container">
                    <div class="row">
                        @foreach($movies_top as $movie_top)
                            <x-movie :movie="$movie_top"/>
                        @endforeach
                    </div>
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