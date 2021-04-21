@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Remind me a password</h3>
        <form action="{{route('forgot')}}" method="post">
            @csrf
            <input type="text" name="email" placeholder="Your email" id="email" value="{{old('email')}}">
            <input type="submit" id="submit" value="Send email">
        </form>
    </div>
@endsection