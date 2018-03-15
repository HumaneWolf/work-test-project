<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $table = 'movies';
    
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
    public $timestamps = [
        'created_at',
        'updated_at',
    ];

    /**
     * Add an actor to this movie.
     * 
     * $actor - The actor to add. Actor Object.
     */
    public function addActor($actor)
    {
        $relationship = new ActorMovie();
        $relationship->movie_id = $this->id;
        $relationship->actor_id = $actor->id;
        $relationship->save();
    }

    /**
     * Add a rating to the movie.
     * 
     * $num - The rating to add. Numerical value.
     */
    public function addRating($num)
    {
        $rating = new Rating();
        $rating->movie_id = $this->id;
        $rating->rating = $num;
        $rating->save();
    }

    /**
     * Add a genre to the movie.
     * 
     * $genre - The genre to add. Genre Object.
     */
    public function addGenre($genre)
    {
        $relationship = new GenreMovie();
        $relationship->movie_id = $this->id;
        $relationship->genre_id = $genre->id;
        $relationship->save();
    }

    /**
     * Get the movie's rating.
     */
    public function getRating()
    {
        return Rating::where('movie_id', $this->id)
            ->avg('rating');
    }

    /**
     * Get the movie's poster url.
     */
    public function getPoster()
    {
        return config('moviesdb.posterBaseUrl') . $this->poster_name;
    }
}
