<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
    <div class="header-bar">
      <div class="grid-container">
          <h1>{{ config('app.name') }}</h1>
      </div>
    </div>

    <div class="grid-container">
      <div class="grid-x grid-padding-x content-root">
        @yield('content')
      </div>
    </div>

    <script src="js/vendor.js"></script>
    <script src="js/app.js"></script>
    @yield('script')
  </body>
</html>
