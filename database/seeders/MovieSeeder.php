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
    }
}
