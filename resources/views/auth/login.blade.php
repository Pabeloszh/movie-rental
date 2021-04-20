@extends('layouts.app')

@section('content')
    <div class="container">
         @if(session('status'))
            <div class="bg-danger">
                {{session('status')}}
            </div>
            @endif
        <h3>Login</h3>
        <form action="{{route('login')}}" method="post">
            @csrf
            <input type="text" name="email" placeholder="Your email" id="email" value="{{old('email')}}">
            <input type="password" name="password" placeholder="Choose password" id="password">
            <input type="submit" id="submit" value="Login">
        </form>
    </div>
@endsection