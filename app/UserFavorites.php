<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFavorites extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
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
