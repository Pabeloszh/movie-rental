<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(Movie $movie){
        $movies_rec = Movie::orderBy('created_at', 'DESC')->get();
        $movies_top = Movie::orderBy('rents', 'DESC')->get();
        $search = request()->query('search');
        $searchArray = explode(' ', $search);
        
        if($search){
            $sArr = [];
            foreach($searchArray as $el) {
                array_push($sArr, "(title ILIKE '%$el%' OR director ILIKE '%$el%' OR genre ILIKE '%$el%')");
            }
            $query = join (' AND ', $sArr);
            $movies = Movie::whereRaw($query)->get();
        } else {
            $movies = Movie::orderBy('created_at', 'DESC')->get();
        }

        // if(Rent::select('movie_id')->where('user_id', auth()->user()->id)->where('deleted_at', null)->whereMonth('updated_at', '<',  Carbon::today()->subMonths(1))->get()->count() !== 0){
        //     dd(Rent::select('movie_id')->where('user_id', auth()->user()->id)->where('deleted_at', null)->whereMonth('updated_at', '<',  Carbon::today()->subMonths(1))->get()->count());
        // }

        return view('home', [
            'movies_top'=>$movies_top,
            'movies_rec'=> $movies_rec,
            'movies'=>$movies
        ]);
    }
}
