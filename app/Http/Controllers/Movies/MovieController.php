<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MovieController extends Controller
{
    public function index(){
        $movies_rec = Movie::orderBy('created_at', 'DESC')->get();
        $search = request()->query('search');
        $searchArray = explode(' ', $search);
        
        if($search){
            $sArr = [];
            foreach($searchArray as $el) {
                array_push($sArr, "title ILIKE '%$el%' OR director ILIKE '%$el%' OR genre ILIKE '%$el%'");
            }
            $query = join (' AND ', $sArr);
            $movies = DB::select('SELECT * FROM MOVIES WHERE ' . $query . "\n");
            // echo 'SELECT * FROM MOVIES WHERE ' . $query . "\n";
        } else {
            $movies = Movie::orderBy('created_at', 'DESC')->get();
        }
        
        return view('home', [
            'movies_rec'=> $movies_rec,
            'movies'=>$movies
        ]);
    }
}
