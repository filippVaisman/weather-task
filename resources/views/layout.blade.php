<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather</title>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <script src="{{asset("js/app.js")}}"></script>
</head>
<body>

    <!-- As a link -->
    <nav class="navbar navbar-light bg-light shadow-sm">
        <a class="navbar-brand" href="/">Weather app</a>
    </nav>
    <div class="content">
        @yield("content")
    </div>

</body>
</html>
