<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use \App\Movie;
use \App\UserFavorite;

class MovieController extends Controller
{
    public function getList(Request $request)
    {
        // Generate sorting parameters.
        $column = 'id';
        $order = 'asc';

        if (!is_null($request->column) && in_array($request->column, ['id', 'title', 'year'])) {
            $column = $request->column;
        }
        if (!is_null($request->order) && in_array($request->order, ['asc', 'desc'])) {
            $order = $request->order;
        }

        // Get movies, with filter if that's what's wanted.
        if (!is_null($request->filter) && Auth::check() && $request->filter == 'favs') {
            $list = UserFavorite::where('user_id', Auth::id())->get();
            $movies = Movie::whereIn('id', $list)
                ->orderBy($column, $order)
                ->paginate();
        } else {
            $movies = Movie::orderBy($column, $order)
                ->paginate(10);
        }

        // Include get parameters to paginator
        $movies->appends(Input::except('page'));

        return view('movie.list',
            [
                'movies' => $movies,
            ]
        );
    }

    public function getDetails($movieId)
    {
        $movie = Movie::findOrFail($movieId);
        return view('movie.home');
    }
}
