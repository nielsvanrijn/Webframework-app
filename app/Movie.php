<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'year', 'poster', 'duration', 'date', 'rating', 'director', 'stars', 'photos', 'trailer', 'storyline'];
    public $timestamps = false;

    public function genres() {
        return $this->belongsToMany(
            Genre::class,
            'movie_genre',
            'movie_id',
            'genre_id'
        );
    }
}
