<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenreMovie extends Model
{
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
    protected $timestamps = [
        'created_at',
        'updated_at',
    ];
}
