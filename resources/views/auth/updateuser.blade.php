@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Settings</h3>
        <form action="{{route('update')}}" method="post">
            @csrf
            <input type="text" name="name" placeholder="Your name" id="name" value="{{auth()->user() -> name}}">
            <input type="text" name="email" placeholder="Your email" id="email" value="{{auth()->user() -> email}}">
            <input type="password" name="old_password" placeholder="Old password" id="old_password">
            <input type="password" name="password" placeholder="Choose password" id="password">
            <input type="password" name="password_confirmation" placeholder="Repeat password" id="password_confirmation">
            <input type="submit" id="submit" value="Change">
        </form>
    </div>
@endsection