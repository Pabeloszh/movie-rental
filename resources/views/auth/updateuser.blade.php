@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 col-sm-6 col-xl-4 mx-auto mb-4 px-4 py-3 rounded">
        @if(session('status'))
             <div class="bg-danger text-white px-3 py-2 mb-2 rounded">
                <i class="fas fa-exclamation-circle"></i> {{session('status')}}
            </div>
        @endif
        <h3>Settings</h3>
        <form class="d-flex flex-column mt-3" action="{{route('update')}}" method="post">
            @csrf
            <input class="mt-2 form-control @error('name') border border-danger @enderror" type="text" name="name" placeholder="Your name" id="name" value="{{auth()->user() -> name}}">
             @error('name')
                    <p class="text-danger mx-1 mb-0">
                        {{$message}}
                    </p>
            @enderror
            <input class="mt-2 form-control @error('email') border border-danger @enderror" type="text" name="email" placeholder="Your email" id="email" value="{{auth()->user() -> email}}">
             @error('email')
                    <p class="text-danger mx-1 mb-0">
                        {{$message}}
                    </p>
            @enderror
            <input class="mt-2 form-control" type="password" name="old_password" placeholder="Old password" id="old_password">
             @error('old_password')
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
            <input class="mt-2 form-control @error('password') border border-danger @enderror" type="password" name="password_confirmation" placeholder="Repeat password" id="password_confirmation">
            <input class="btn btn-primary mt-2" type="submit" id="submit" value="Edit">
        </form>
        @if(auth()->user()->admin === false)
        <form action="#" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-2 w-100">Delete account</button>
        </form>
        @endif
    </div>
@endsection