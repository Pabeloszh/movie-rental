@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 mx-auto px-4 py-3 mb-3 rounded">
        <h5>Users</h5>
        @if($users->count() !== 0)
            @foreach($users as $user)
            <div class="bg-white p-2 d-flex mb-2 justify-content-between">
                <div class="d-flex justify-content-between @if($user->banned) text-muted @endif">
                    <p>{{$user->name}}</p>&nbsp;&nbsp;
                    <p>{{$user->email}}</p>&nbsp;&nbsp;
                </div>
                <div>
                    <form action="{{route('adminpanel.ban', ['user' => $user->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="fas fa-ban text-danger @if($user->banned) text-muted @endif"></i></button>
                    </form>
                </div>
            </div>
            @endforeach
        @endif
    </div>
    <div class="bg-light col-10 mx-auto px-4 mb-3 py-3 rounded">
        <h5>Movies</h5>
        <form action="{{route('adminpanel.movie.post')}}" method="post">
            @csrf
            <input type="text" name="title" id="title" placeholder="Title">
            <input type="text" name="director" id="director" placeholder="Director">
            <input type="text" name="genre" id="genre" placeholder="Genre">
            <input type="text" name="premiere" id="premiere" placeholder="Premiere">
            <textarea name="desc" id="desc" cols="30" rows="4" class="" placeholder="Description"></textarea>
            <button type="submit">Add Movie</button>
        </form>
        @if($movies->count() !== 0)
            @foreach($movies as $movie)
            <div class="bg-white p-2 d-flex mb-2 justify-content-between">
                <div class="d-flex justify-content-between">
                    <p>{{$movie->title}}</p>&nbsp;&nbsp;
                    <p>{{$movie->director}}</p>&nbsp;&nbsp;
                    <p>{{$movie->genre}}</p>&nbsp;&nbsp;
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{route('adminpanel.movie.edit', ['movie' => $movie->id])}}"><i class="far fa-edit"></i></a>
                    <form action="{{route('adminpanel.movie.delete', ['movie' => $movie->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
            @endforeach
        @endif
    </div>
    <div class="bg-light col-10 mx-auto px-4 py-3 rounded">
        <h5>Expired rents</h5>
        @if($users_rents->count() !== 0)
            @foreach($users_rents as $users_rent)
            <div class="bg-white p-2 d-flex mb-2 justify-content-between">
                <div class="d-flex justify-content-between">
                    <p>{{$users_rent->name}}</p>&nbsp;&nbsp;
                    <p>{{$users_rent->email}}</p>&nbsp;&nbsp;
                </div>
                <div class="d-flex justify-content-between">
                    @foreach($users_rent->rents as $rents)
                        <a href="{{route('movie', ['movie'=>$rents->movie_id])}}">{{$rents->movie_id}},</a>&nbsp;
                    @endforeach
                </div>
            </div>
            @endforeach
        @endif
    </div>
@endsection