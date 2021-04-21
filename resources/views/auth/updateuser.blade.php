@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 col-sm-6 col-xl-4 mx-auto px-4 py-3 rounded">
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
    </div>
@endsection