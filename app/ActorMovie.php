<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorMovie extends Model
{
    public $table = 'actors_movies';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'actor_id',
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
