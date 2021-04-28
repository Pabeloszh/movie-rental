@extends('layouts.app')

@section('content')
    <div class="bg-light col-10 mx-auto px-4 py-3 rounded">
        <h5>Expired rents</h5>
        @if($users_rents->count() !== 0)
            @foreach($users_rents as $users_rent)
            <div class="bg-white p-2 d-flex mb-2 justify-content-between">
                <div class="d-flex justify-content-between">
                    <p>{{$users_rent->name}}</p>&nbsp;&nbsp;
                    <p>{{$users_rent->email}}</p>&nbsp;&nbsp;
                </div>
                <div class="d-flex justify-content-between">
                    @foreach($users_rent->rents as $rents)
                        <a href="{{route('movie', ['movie'=>$rents->movie_id])}}">{{$rents->movie_id}},</a>&nbsp;
                    @endforeach
                </div>
            </div>
            @endforeach
        @endif
    </div>
@endsection