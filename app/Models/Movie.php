<?php

namespace App\Models;

use App\Models\Rent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'director',
        'genre',
        'premiere',
        'desc',
        'rents'
    ];

    public function rents(){
        return $this->hasMany(Rent::class);
    }

}
