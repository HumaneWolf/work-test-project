<?php

namespace App;

class MovieView extends Movie
{
	/*
		This class exists purely to give access to a movie's rating as a field, using the movies_view view in the database.
		The only differences from the main Movie class is that this class may be unable to update data, and that it has that calculated rating field.
		It's very useful when rendering the movie list, since that list needs to be able to sort by rating.

		Any time you need to edit a movie and save it, delete it, create a movie, etc, USE THE Movie MODEL.
	*/

	public $table = 'movies_view';

	/**
	 * Add rating as a field.
	 */
    function __construct() {
    	$this->fillable[] = 'rating';
    }
}
