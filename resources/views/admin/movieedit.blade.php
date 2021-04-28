@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 col-sm-6 col-xl-4 mx-auto px-4 py-3 rounded">
        {{-- @if(session('status'))
             <div class="bg-danger text-white px-3 py-2 mb-2 rounded">
                <i class="fas fa-exclamation-circle"></i> {{session('status')}}
            </div>
        @endif --}}
        <h3>Edit Movie Data</h3>
        <form class="d-flex flex-column mt-3" action="{{route('adminpanel.movie.edit', ['movie'=>$movie])}}" method="post">
            @csrf
            <input type="text" name="title" id="title" placeholder="Title" value="{{$movie->title}}">
            <input type="text" name="director" id="director" placeholder="Director" value="{{$movie->director}}">
            <input type="text" name="genre" id="genre" placeholder="Genre" value="{{$movie->genre}}">
            <input type="text" name="premiere" id="premiere" placeholder="Premiere" value="{{$movie->premiere}}">
            <textarea name="desc" id="desc" cols="30" rows="4" class="" placeholder="Description">{{$movie->desc}}</textarea>
            <button type="submit">Add Movie</button>
        </form>
        </form>
    </div>
@endsection