@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 mx-auto px-4 py-3 mb-3 rounded">
        <h5>Users</h5>
        @if($users->count() !== 0)
            @foreach($users as $user)
            <div class="bg-white p-2 d-flex mb-2 justify-content-between align-items-center rounded">
                <div class="d-flex justify-content-between @if($user->banned) text-muted @endif">
                    <p class="m-0 fw-bold">{{$user->name}}</p>&nbsp;
                    <p class="m-0 d-none d-sm-block">{{$user->email}}</p>&nbsp;
                </div>
                <div>
                    <form action="{{route('adminuser.ban', ['user' => $user->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-link fw-bold" type="submit"><i class="fas fa-ban text-danger @if($user->banned) text-muted @endif"></i></button>
                    </form>
                </div>
            </div>
            @endforeach
        @endif
    </div>
@endsection