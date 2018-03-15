<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenreMovie extends Model
{
    public $table = 'genres_movies';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'genre_id',
        'movie_id',
    ];

    /**
     * Timestamp attributes
     */
    public $timestamps = [
        'created_at',
        'updated_at',
    ];
}
