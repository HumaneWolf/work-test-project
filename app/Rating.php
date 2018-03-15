<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $table = 'ratings';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'movie_id',
        'rating',
    ];

    /**
     * Timestamp attributes
     */
    public $timestamps = [
        'created_at',
        'updated_at',
    ];
}
