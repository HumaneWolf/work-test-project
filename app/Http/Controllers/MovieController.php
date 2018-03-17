<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use \App\Movie;
use \App\MovieView;
use \App\UserFavorite;

class MovieController extends Controller
{
    public function getList(Request $request)
    {
        // Generate sorting parameters.
        $column = 'id';
        $order = 'asc';

        if (!is_null($request->column) && in_array($request->column, ['id', 'title', 'release_date', 'rating'])) {
            $column = $request->column;
        }
        if (!is_null($request->order) && in_array($request->order, ['asc', 'desc'])) {
            $order = $request->order;
        }

        // Get movies, with filter if that's what's wanted.
        if (!is_null($request->filter) && Auth::check() && $request->filter == 'favs') {
            // Nested queries instead of a join to avoid adding unnecessary complexity to the query and it's implementation.
            $list = UserFavorite::where('user_id', Auth::id())->get(['movie_id']);
            $movies = MovieView::whereIn('id', $list)
                ->orderBy($column, $order)
                ->paginate(10);
        } else {
            $movies = MovieView::orderBy($column, $order)
                ->paginate(10);
        }


        // Include get parameters to paginator
        $movies->appends(Input::except('page'));

        return view('movie.list',
            [
                'filter' => !is_null($request->filter) ? $request->filter : null,
                'column' => $column,
                'order'  => $order,
                'movies' => $movies,
            ]
        );
    }

    public function getDetails($movieId)
    {
        $movie = Movie::findOrFail($movieId);
        return view(
            'movie.details',
            [
                'movie' => $movie,
            ]
        );
    }

    public function postFavorite($movieId)
    {
        if (!Auth::check()) { // Is the user logged in?
            return redirect()->back()->withErrors(['You must be logged in to add or remove a favorite.']);
        }

        $movie = Movie::findOrFail($movieId);
        $user = Auth::user();

        if ($user->isFavorite($movie)) {
            $user->delFavorite($movie);
        } else {
            $user->addFavorite($movie);
        }


        return redirect()->back();
    }
}
