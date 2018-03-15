<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $table = 'users';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    public $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Add the selected movie to the user's favorites.
     * 
     * $movie - The movie to add. Movie Object.
     */
    public function addFavorite($movie) {
        $relationship = new UserFavorite();
        $relationship->movie_id = $movie->id;
        $relationship->user_id = $this->id;
        $relationship->save();
    }

    /**
     * Remove the selected movie from the user's favorites.
     * 
     * $movie - The movie to remove. Movie Object.
     */
    public function delFavorite($movie) {
        UserFavorite::where('movie_id', $movie->id)
            ->where('user_id', $this->id)
            ->delete();
    }

    /**
     * Check whether the selected movie is a favorite.
     * 
     * $movie - The movie to check. Movie Object.
     */
    public function isFavorite($movie) {
        return UserFavorite::where('movie_id', $movie->id)
            ->where('user_id', $this->id)
            ->count() == 1;
    }
}
