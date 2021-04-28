<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Jon Snow',
            'email' => 'snow@gmail.com',
            'admin' => 0,
            'password' => bcrypt('123'),
            'confirmed' => 1,
            'confirmation_token' => '123456'
        ]);
        $user = User::create([
            'name' => 'Bojack Horseman',
            'email' => 'bojack@gmail.com',
            'admin' => 0,
            'password' => bcrypt('123'),
            'confirmed' => 1,
            'confirmation_token' => '123456'
        ]);
        $user = User::create([
            'name' => 'Walter White',
            'email' => 'heisenberg@gmail.com',
            'admin' => 0,
            'password' => bcrypt('123'),
            'confirmed' => 1,
            'confirmation_token' => '123456'
        ]);
        $user = User::create([
            'name' => 'Elliot Anderson',
            'email' => 'mrrobot@gmail.com',
            'admin' => 0,
            'password' => bcrypt('123'),
            'confirmed' => 1,
            'confirmation_token' => '123456'
        ]);
        $user = User::create([
            'name' => 'Kamil TumuLec',
            'email' => 'legia@gmail.com',
            'admin' => 0,
            'password' => bcrypt('123'),
            'confirmed' => 1,
            'confirmation_token' => '123456'
        ]);
    }
}
