@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 mx-auto px-4 mb-3 py-3 rounded">
        <h5>Movies</h5>
        <form action="{{route('adminmovies.post')}}" method="post">
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
                    <a href="{{route('adminmovies.edit', ['movie' => $movie->id])}}"><i class="far fa-edit"></i></a>
                    <form action="{{route('adminmovies.delete', ['movie' => $movie->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
            @endforeach
        @endif
    </div>
@endsection