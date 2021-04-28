@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 mx-auto px-4 py-3 mb-3 rounded">
        <h5>Users</h5>
        @if($users->count() !== 0)
            @foreach($users as $user)
            <div class="bg-white p-2 d-flex mb-2 justify-content-between">
                <div class="d-flex justify-content-between @if($user->banned) text-muted @endif">
                    <p>{{$user->name}}</p>&nbsp;&nbsp;
                    <p>{{$user->email}}</p>&nbsp;&nbsp;
                </div>
                <div>
                    <form action="{{route('adminpanel.ban', ['user' => $user->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="fas fa-ban text-danger @if($user->banned) text-muted @endif"></i></button>
                    </form>
                </div>
            </div>
            @endforeach
        @endif
    </div>
@endsection