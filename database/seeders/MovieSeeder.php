<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movie = Movie::create([
            'title' => 'Nobody',
            'director' => 'Ilya Naishuller',
            'genre' => 'Action',
            'premiere' => '18-03-2021',
            'desc' => 'A bystander who intervenes to help a woman being harassed by a group of men becomes the target of a vengeful drug lord.'
        ]);
      
        $movie = Movie::create([
            'title' => 'The Shawshank Redemption',
            'director' => 'Frank Darabont',
            'genre' => 'Drama',
            'premiere' => '16-04-1995',
            'desc' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency..'
        ]);

        $movie = Movie::create([
            'title' => 'The Godfather',
            'director' => 'Francis Ford Coppola',
            'genre' => 'Drama',
            'premiere' => '31-12-1972',
            'desc' => 'An organized crime dynasty`s aging patriarch transfers control of his clandestine empire to his reluctant son.'
        ]);
        $movie = Movie::create([
            'title' => 'The Dark Knight',
            'director' => 'Christopher Nolan',
            'genre' => 'Action',
            'premiere' => '8-08-2008',
            'desc' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.'
        ]);
        $movie = Movie::create([
            'title' => 'Pulp Fiction',
            'director' => 'Quentin Tarantino',
            'genre' => 'Drama',
            'premiere' => '19-05-1995',
            'desc' => 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.'
        ]);
        $movie = Movie::create([
            'title' => 'Inception',
            'director' => 'Christopher Nolan',
            'genre' => 'Action',
            'premiere' => '30-06-2010',
            'desc' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.'
        ]);
        $movie = Movie::create([
            'title' => 'The Silence of the Lambs',
            'director' => 'Jonathan Demme',
            'genre' => 'Crime',
            'premiere' => '30-01-1992',
            'desc' => 'A young F.B.I. cadet must receive the help of an incarcerated and manipulative cannibal killer to help catch another serial killer, a madman who skins his victims.'
        ]);
    }
}
