<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'year', 'poster', 'duration', 'genre', 'date', 'rating', 'director', 'stars', 'photos', 'trailer', 'storyline'];
    public $timestamps = false;
}
