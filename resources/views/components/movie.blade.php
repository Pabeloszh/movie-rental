@props(['movie'=>$movie])
<div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$movie->title}}</h5>
            <h6 class="card-subtitle mb-1 text-muted">{{$movie->genre}} {{$movie->premiere}}</h6>
            <p class="mb-3 text-muted">{{$movie->director}}</p>
            <p class="card-text">{{$movie->desc}}</p>
            <a href="{{route('movie', ['movie' => $movie->id])}}" class="card-link">Read more</a>
            @auth
            <form action="{{route('rent', $movie)}}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary @if(auth()->user()->rents->where('user_id', auth()->user()->id)->where('movie_id', $movie->id)->where('rented', false)->first() !== null) disabled @endif">Rent movie</button>
            </form>
            @endauth
        </div>
    </div>
</div>