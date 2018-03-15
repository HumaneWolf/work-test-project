@extends('layouts.master')

@section('content')
  <table class="movie-list">
    <tr>
      <th></th>
      <th>Title</th>
      <th>Year</th>
      <th>Rating</th>
    </tr>
    @foreach($movies as $movie)
      <tr>
        
        <td><a href="{{ route('movie.details', [ 'id' => $movie->id ]) }}" class="movie-link"><img src="{{ $movie->getPoster() }}" class="movie-poster-small" /><br>Details</a></td>
        <td>{{ $movie->title }}</td>
        <td>{{ date('Y', strtotime($movie->release_date)) }}</td>
        <td>{{ round($movie->getRating(), 1) }}</td>
      </tr>
    @endforeach
  </table>

  <div class="pagination">{!! $movies->links(); !!}</div>
@endsection