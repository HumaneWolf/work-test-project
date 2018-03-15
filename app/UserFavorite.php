<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    public $table = 'user_favorites';

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
    public $timestamps = [
        'created_at',
        'updated_at',
    ];
}
