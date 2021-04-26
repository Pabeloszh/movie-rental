<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Rent;
use Illuminate\Support\Facades\DB;

class RentingController extends Controller
{
    public function store(Movie $movie, Request $request){
        $movie->rents()->create([
            'user_id'=>$request->user()->id,
        ]);
        $movie->increment('rents');
        // dd($movie->rents);
        // auth()->user->rents()->create([
        //     'user_id'=>auth()->user()->id,
        // ]);
        // Rent::create([
        //     'user_id'=>auth()->user()->id,
        //     'movie_id'=>$movie->id,
        //     'rented'=>0,
        // ]);
        // dd($movie->id, auth()->user()->id);
        return back();
    }
}
