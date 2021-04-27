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

        return back();
    }
    public function back(Movie $movie){
        $rent = Rent::where('user_id', auth()->user()->id)->where('movie_id', $movie->id);
        $rent->delete();
        
        return back();
    }
}
