@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 mx-auto px-4 mb-3 py-3 rounded">
        <h5>Movies</h5>
        <form class="d-flex flex-column mb-5" action="{{route('adminmovies.post')}}" method="post">
            @csrf
            <input class="mt-3 form-control @error('title') border border-danger @enderror" type="text" name="title" id="title" placeholder="Title">
             @error('title')
                    <p class="text-danger mx-1 mb-0">
                        {{$message}}
                    </p>
            @enderror
            <input class="mt-3 form-control @error('director') border border-danger @enderror" type="text" name="director" id="director" placeholder="Director">
             @error('director')
                    <p class="text-danger mx-1 mb-0">
                        {{$message}}
                    </p>
            @enderror
            <input class="mt-3 form-control @error('genre') border border-danger @enderror" type="text" name="genre" id="genre" placeholder="Genre">
             @error('genre')
                    <p class="text-danger mx-1 mb-0">
                        {{$message}}
                    </p>
            @enderror
            <input class="mt-3 form-control @error('premiere') border border-danger @enderror" type="text" name="premiere" id="premiere" placeholder="Premiere">
             @error('premiere')
                    <p class="text-danger mx-1 mb-0">
                        {{$message}}
                    </p>
            @enderror
            <textarea class="mt-3 form-control @error('desc') border border-danger @enderror" name="desc" id="desc" cols="30" rows="4" class="" placeholder="Description"></textarea>
             @error('desc')
                    <p class="text-danger mx-1 mb-0">
                        {{$message}}
                    </p>
            @enderror
            <button class="btn btn-primary mt-3" type="submit">Add Movie</button>
        </form>
        @if($movies->count() !== 0)
            @foreach($movies as $movie)
            <div class="bg-white p-2 d-flex mb-2 justify-content-between align-items-center rounded">
                <div class="d-flex justify-content-between">
                    <p class="m-0 fw-bold">{{$movie->title}}</p>&nbsp;
                    <p class="m-0 d-none d-md-block">{{$movie->director}}</p>&nbsp;
                    <p class="m-0 d-none d-sm-block text-primary">{{$movie->genre}}</p>&nbsp;
                </div>
                <div class="d-flex justify-content-between">
                    <a class="py-1" href="{{route('adminmovies.edit', ['movie' => $movie->id])}}"><i class="far fa-edit"></i></a>
                    <form action="{{route('adminmovies.delete', ['movie' => $movie->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-link text-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
            @endforeach
        @endif
    </div>
@endsection