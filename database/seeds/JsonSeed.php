<?php

use Illuminate\Database\Seeder;

use \App\Actor;
use \App\Genre;
use \App\Movie;

class JsonSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = json_decode(file_get_contents('task/database.json'));

        // Add each movie
        foreach($file as $m) {
            $movie = new Movie();
            $movie->id = intval($m->id);
            $movie->title = $m->title;
            $movie->original_title = $m->originalTitle != '' ? $m->originalTitle : null;
            $movie->storyline = $m->storyline;
            $movie->poster_name = $m->poster;
            $movie->release_date = $m->releaseDate;
            $movie->imdb_rating = $m->imdbRating != '' ? $m->imdbRating : null;
            $movie->save();

            // Add each rating.
            foreach($m->ratings as $r) {
                $movie->addRating($r);
            }

            // Add genres.
            foreach($m->genres as $g) {
                $genre = Genre::where('name', $g)->get();
                if ($genre->count() <= 0) {
                    $genre = new Genre();
                    $genre->name = $g;
                    $genre->save();
                }
                $movie->addGenre($genre->first());
            }

            // Add actors.
            foreach($m->actors as $a) {
                $actor = Actor::where('name', $a)->get();
                if ($actor->count() == 0) {
                    $actor = new Actor();
                    $actor->name = $a;
                    $actor->save();
                }
                $movie->addActor($actor);
            }
        }
    }
}
