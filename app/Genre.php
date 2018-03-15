<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Timestamp attributes
     */
    protected $timestamps = [
        'created_at',
        'updated_at',
    ];
}
