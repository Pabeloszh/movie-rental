<?php

namespace App\Http\Controllers\MyMovies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Rent;
use Carbon\Carbon;

class RentedMoviesController extends Controller
{
    public function index(){
        $rented = Rent::select('movie_id')->where('user_id', auth()->user()->id)->where('deleted_at', null)->get();
        $history = Rent::select('movie_id')->withTrashed()->where('user_id', auth()->user()->id)->get();
        $overdue  = Rent::select('movie_id')->where('user_id', auth()->user()->id)->whereMonth('updated_at', '<',  Carbon::today()->subMonths(1))->get();


        $movies_rented = Movie::whereIn('id', $rented)->get();
        $movies_history = Movie::whereIn('id', $history)->get();
        $movies_overdue  = Movie::whereIn('id', $overdue)->get();

        return view('mymovies.rentedmovies', [
            'movies_rented'=>$movies_rented,
            'movies_history'=>$movies_history,
            'movies_overdue'=>$movies_overdue
        ]);
    }
}
