<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'original_title',
        'storyline',
        'poster_name',
        'release_date',
        'imdb_rating',
    ];

    /**
     * Timestamp attributes
     */
    protected $timestamps = [
        'created_at',
        'updated_at',
    ];
}
