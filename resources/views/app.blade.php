<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="/css/app.css" type="text/css" />
        @yield('styles')

        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        @yield('scripts')
    </head>

    <body>
      <div class="content">
        @yield('content')
      </div>
    </body>
</html>
