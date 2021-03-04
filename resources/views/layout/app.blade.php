<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="base-url" content="{{ url('/') }}">
    <title>Todo App</title>
    <!-- Bootstrap core CSS -->
    <link href='{{ asset("public/bootstrap-4.6.0-dist/css/bootstrap.min.css") }}' rel="stylesheet" />
    <script src="{{ asset('public/js/app.js') }}"></script>
</head>
<body>
    @yield('contents')
</body>
</html>
