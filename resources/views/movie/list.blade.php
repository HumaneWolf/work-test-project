@extends('layouts.master')

@section('content')
  @if($movies->count() > 0)
    <table class="movie-list">
      <tr>
        <th></th>
        <th>
          <a href="?column=title&order={{ $column == 'title' && $order == 'asc' ? 'desc' : 'asc' }}{{ !is_null($filter) ? '&filter=' . $filter : '' }}" class="movie-sort">
            Title
          </a>
        </th>
        <th>
          <a href="?column=release_date&order={{ $column == 'release_date' && $order == 'asc' ? 'desc' : 'asc' }}{{ !is_null($filter) ? '&filter=' . $filter : '' }}" class="movie-sort">
            Year
          </a>
        </th>
        <th>
          <a href="?column=rating&order={{ $column == 'rating' && $order == 'asc' ? 'desc' : 'asc' }}{{ !is_null($filter) ? '&filter=' . $filter : '' }}" class="movie-sort">
            Rating
          </a>
        </th>
      </tr>
      @foreach($movies as $movie)
        <tr>
          
          <td><a href="{{ route('movie.details', [ 'id' => $movie->id ]) }}" class="movie-link"><img src="{{ $movie->getPoster() }}" class="movie-poster-small" /><br>Details</a></td>
          <td>
            @if(Auth::check() && Auth::user()->isFavorite($movie))
              ★
            @endif
            {{ $movie->title }}
          </td>
          <td>{{ date('Y', strtotime($movie->release_date)) }}</td>
          <td>{{ round($movie->getRating(), 1) }}</td>
        </tr>
      @endforeach
    </table>
  @else
    <div class="callout warning">
      <p>There are no movies to show with your current filter.</p>
    </div>
  @endif

  <div class="pagination">{!! $movies->links(); !!}</div>
@endsection