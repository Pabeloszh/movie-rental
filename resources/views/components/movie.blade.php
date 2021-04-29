@props(['movie'=>$movie])
    <div class="card col-sm-6 col-lg-6 col-xl-4">
        <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <h5 class="card-title">{{$movie->title}}</h5>
                <h6 class="card-subtitle mb-1 text-muted">{{$movie->genre}} {{$movie->premiere}}</h6>
                <p class="mb-3 text-muted">{{$movie->director}}</p>
            </div>
            <p class="card-text">{{$movie->desc}}</p>
            <div class="d-flex justify-content-between">
            <a href="{{route('movie', ['movie' => $movie->id])}}" class="card-link">Read more</a>
            @auth
            @if(auth()->user()->rents->where('user_id', auth()->user()->id)->where('movie_id', $movie->id)->first() === null)
            <form action="{{route('rent', $movie)}}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">Rent movie</button>
            </form>
            @elseif(auth()->user()->rents->where('user_id', auth()->user()->id)->where('movie_id', $movie->id)->where('deleted_at', null)->first() !== null)
            <form action="{{route('back', $movie)}}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">Give back</button>
            </form>
            @endif
            @endauth
            </div>
        </div>
    </div>