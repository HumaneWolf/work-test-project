<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    public $table = 'actors';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Timestamp attributes
     */
    public $timestamps = [
        'created_at',
        'updated_at',
    ];
}
