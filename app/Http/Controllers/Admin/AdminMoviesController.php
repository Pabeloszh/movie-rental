<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class AdminMoviesController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function index(){
        $movies = Movie::get();
        if(auth()->user()->admin === false){
            return redirect()->route('home');
        }

        return view('admin.adminmovie', [
            'movies'=>$movies,
        ]);
    }
    public function store(Request $request){
        $this->validate($request, [
            'title'=>'required|unique:movies,title|max:255',
            'director'=>'required|max:255',
            'genre'=>'required|max:255',
            'premiere'=>'required|max:255',
            'desc'=>'required|max:455',
        ]);

        Movie::create([
            'title' => $request->title,
            'director' => $request->director,
            'genre' => $request->genre,
            'premiere' => $request->premiere,
            'desc' => $request->desc,
        ]);

        return back();
    }
    public function destroy($movie){
        $deleted = Movie::where('id', $movie)->first();
        $deleted->delete();

        return back();
    }
    public function movieindex($movie){
        $movie = Movie::where('id', $movie)->first();

        return view('admin.movieedit', [
            'movie'=>$movie
        ]);
    }
    public function moviestore($movie, Request $request){
        $this->validate($request, [
            'title'=>['required'],
            'director'=>'required|max:255',
            'genre'=>'required|max:255',
            'premiere'=>'required|max:255',
            'desc'=>'required|max:455',
        ]);

        $movie = Movie::where('id', $movie)->first();
        $movie->title = $request->title;
        $movie->director = $request->director;
        $movie->genre = $request->genre;
        $movie->premiere = $request->premiere;
        $movie->desc = $request->desc;
        $movie->save();

        return redirect()->route('adminmovies.edit',[
            'movie'=>$movie
        ]);
    }
}
