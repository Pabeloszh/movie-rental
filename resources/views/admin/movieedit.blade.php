@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 col-sm-6 col-xl-4 mb-4 mx-auto px-4 py-3 rounded">
        <h3>Edit Movie Data</h3>
        <form class="d-flex flex-column mt-3" action="{{route('adminmovies.edit', ['movie'=>$movie])}}" method="post">
            @csrf
            <input class="mt-3 form-control @error('title') border border-danger @enderror" type="text" name="title" id="title" placeholder="Title" value="{{$movie->title}}">
            @error('title')
                    <p class="text-danger mx-1 mb-0">
                        {{$message}}
                    </p>
            @enderror
            <input class="mt-3 form-control @error('director') border border-danger @enderror" type="text" name="director" id="director" placeholder="Director" value="{{$movie->director}}">
            @error('director')
                    <p class="text-danger mx-1 mb-0">
                        {{$message}}
                    </p>
            @enderror
            <input class="mt-3 form-control @error('genre') border border-danger @enderror" type="text" name="genre" id="genre" placeholder="Genre" value="{{$movie->genre}}">
            @error('genre')
                    <p class="text-danger mx-1 mb-0">
                        {{$message}}
                    </p>
            @enderror
            <input class="mt-3 form-control @error('premiere') border border-danger @enderror" type="text" name="premiere" id="premiere" placeholder="Premiere" value="{{$movie->premiere}}">
            @error('premiere')
                    <p class="text-danger mx-1 mb-0">
                        {{$message}}
                    </p>
            @enderror
            <textarea class="mt-3 form-control @error('desc') border border-danger @enderror" name="desc" id="desc" cols="30" rows="4" class="" placeholder="Description">{{$movie->desc}}</textarea>
            @error('desc')
                    <p class="text-danger mx-1 mb-0">
                        {{$message}}
                    </p>
            @enderror
            <button class="btn btn-primary mt-3" type="submit">Add Movie</button>
        </form>
        </form>
    </div>
@endsection