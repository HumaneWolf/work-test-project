@extends('layouts.master')

@section('content')
  <img src="{{ $movie->getPoster() }}" class="movie-poster" />

  <div class="callout">
    @if(Auth::check())
      @if(Auth::user()->isFavorite($movie))
        <form method="post" action="{{ route('movie.details', [ 'id' => $movie->id ]) }}">
          @csrf
          <input type="submit" class="button alert favorite" value="Remove Favorite"/>
        </form>
      @else
        <form method="post" action="{{ route('movie.details', [ 'id' => $movie->id ]) }}">
          @csrf
          <input type="submit" class="button warning favorite" value="Add Favorite"/>
        </form>
      @endif
    @endif

    <h5>{{ $movie->title }}</h5>
    @if($movie->original_title != null)
      <p><strong>Original Title:</strong> {{ $movie->original_title }}</p>
    @endif
    <p><strong>Released:</strong> {{ date('d.m.Y', strtotime($movie->release_date)) }}</p>
    <p><strong>IMDB Rating:</strong> {{ $movie->imdb_rating }} - <strong>Our Rating:</strong> {{ round($movie->getRating(), 1) }}</p>
  </div>
  @if($movie->storyline != '')
    <div class="callout">
      {{ $movie->storyline }}
    </div>
  @endif
  <div class="callout">
    <p>
      <strong>Actors:</strong>
      @foreach(\App\Actor::whereIn('id', \App\ActorMovie::where('movie_id', $movie->id)->get())->get() as $actor)
        {{ $actor->name }}, 
      @endforeach
    </p>
    <p>
      <strong>Genres:</strong>
      @foreach(\App\Genre::whereIn('id', \App\GenreMovie::where('movie_id', $movie->id)->get())->get() as $genre)
        {{ $genre->name }}, 
      @endforeach
    </p>
  </div>
@endsection