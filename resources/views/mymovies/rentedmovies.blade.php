@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 mx-auto px-4 py-3 rounded">
        <div>
            <h3>Your Rented Movies</h3>
            @if($movies_rented->count())
                <div class="d-flex my-3">
                    @foreach($movies_rented as $movie_rented)
                        <x-movie :movie="$movie_rented"/>
                    @endforeach
                </div>
            @else
                <p>You have no movies rented</p>
            @endif
        </div>
        <div>
            <h3>Your Renting History</h3>
            @if($movies_history->count())
                <div class="d-flex my-3">
                    @foreach($movies_history as $movie_history)
                        <x-movie :movie="$movie_history"/>
                    @endforeach
                </div>
            @else
                <p>You have rented no movies</p>
            @endif
        </div>
        <div>
            <h3>Your Overdue Movies</h3>
            @if($movies_overdue->count())
                <div class="d-flex my-3">
                    @foreach($movies_overdue as $movie_overdue)
                        <x-movie :movie="$movie_overdue"/>
                    @endforeach
                </div>
            @else
                <p>You have no overdued movies</p>
            @endif
        </div>
    </div>
@endsection