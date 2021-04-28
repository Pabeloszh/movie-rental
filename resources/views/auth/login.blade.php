@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 col-sm-6 col-xl-4 mx-auto px-4 py-3 mb-4 rounded">
        @if(session('status'))
             <div class="bg-danger text-white px-3 py-2 mb-2 rounded">
                <i class="fas fa-exclamation-circle"></i> {{session('status')}}
            </div>
        @endif
        <h3>Login</h3>
        <form class="d-flex flex-column mt-3" action="{{route('login')}}" method="post">
            @csrf
            <input class="mt-2 form-control @error('email') border border-danger @enderror" type="text" name="email" placeholder="Your email" id="email" value="{{old('email')}}">
            @error('email')
                    <p class="text-danger mx-1 mb-0">
                        {{$message}}
                    </p>
            @enderror
            <input class="mt-2 form-control @error('password') border border-danger @enderror" type="password" name="password" placeholder="Choose password" id="password">
            @error('password')
                    <p class="text-danger mx-1 mb-0">
                        {{$message}}
                    </p>
            @enderror
            <a class="link-primary mt-1" href="{{route('forgot')}}">Forgot password?</a>
            <input class="btn btn-primary mt-2" type="submit" id="submit" value="Login">
        </form>
    </div>
@endsection