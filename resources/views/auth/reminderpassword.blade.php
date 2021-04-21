@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Select new password</h3>
        <form action="{{route('new-password', ['prop' => $prop])}}" method="post">
            @csrf
            <input type="password" name="password" placeholder="Choose password" id="password">
            <input type="password" name="password_confirmation" placeholder="Repeat password" id="password_confirmation">
            <input type="submit" id="submit" value="Change password">
        </form>
    </div>
@endsection