@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 col-sm-6 col-xl-4 mx-auto px-4 py-3 rounded mb-4">
        <h2>{{$movie->title}}</h2>
        <h4>{{$movie->genre}} {{$movie->premiere}}</h4>
        <h4>{{$movie->director}}</h4>
        <p>{{$movie->desc}}</p>
        <form action="{{route('rent', $movie)}}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary @if(auth()->user()->rents->where('user_id', auth()->user()->id)->where('movie_id', $movie->id)->where('rented', false)->first() !== null) disabled @endif">Rent movie</button>
        </form>
    </div>
@endsection