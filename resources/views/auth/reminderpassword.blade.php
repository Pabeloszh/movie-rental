@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 col-sm-6 col-xl-4 mx-auto px-4 py-3 rounded">
        <h3>Select new password</h3>
        <form class="d-flex flex-column mt-3" action="{{route('new-password', ['prop' => $prop])}}" method="post">
            @csrf
            <input class="mt-2 form-control @error('password') border border-danger @enderror" type="password" type="password" name="password" placeholder="Choose password" id="password">
             @error('password')
                    <p class="text-danger mx-1 mb-0">
                        {{$message}}
                    </p>
            @enderror
            <input class="mt-2 form-control @error('password') border border-danger @enderror" type="password" type="password" name="password_confirmation" placeholder="Repeat password" id="password_confirmation">
            <input class="btn btn-primary mt-2" type="submit" id="submit" value="Change password">
        </form>
    </div>
@endsection