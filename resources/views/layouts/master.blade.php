<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/foundation.css">
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <div class="header-bar">
      <div class="grid-container">
          <h1>{{ config('app.name') }}</h1>
      </div>
    </div>

    <div class="grid-container">
      <div class="grid-x grid-padding-x content-root">
        <div class="large-8 medium-8 cell">
          @yield('content')
        </div>

        <div class="large-4 medium-4 cell">
          @if($errors->any())
            <div class="callout alert">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <h5>My Account</h5>
          @if(Auth::check())
            <a href="{{ route('movie.list') }}" class="button">All Movies</a>
            <a href="{{ route('movie.list') }}?filter=favs" class="button warning">Favorites</a>
            <form method="post" action="{{ route('auth.logout') }}">
              @csrf
              <input type="submit" class="button alert" value="Log out" />
            </form>
          @else
            <form method="post" action="{{ route('auth.login') }}">
              @csrf
              <label>
                Email
                <input type="text" name="email" placeholder="email@example.com" />
              </label>
              <label>
                Password
                <input type="password" name="password" placeholder="password..." />
              </label>
              <span class="auth-submit">
                <input type="submit" class="button" value="Log in" />
                <a href="{{ route('auth.register') }}" class="button warning">Register</a>
                <a href="{{ route('password.reset') }}"class="button alert">Password Reset</a>
              </span>
            </form>
          @endif
        </div>
      </div>
    </div>

    <script src="/js/vendor.js"></script>
    <script src="/js/app.js"></script>
    @yield('script')
  </body>
</html>
