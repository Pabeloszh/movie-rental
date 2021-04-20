@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Register</h3>
        <form action="{{route('register')}}" method="post">
            @csrf
            <input type="text" name="name" placeholder="Your name" id="name" value="{{old('name')}}">
            <input type="text" name="email" placeholder="Your email" id="email" value="{{old('email')}}">
            <input type="password" name="password" placeholder="Choose password" id="password">
            <input type="password" name="password_confirmation" placeholder="Repeat password" id="password_confirmation">
            <input type="submit" id="submit" value="Register">
        </form>
    </div>
@endsection