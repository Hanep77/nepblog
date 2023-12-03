<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NepBlog | {{ $title }}</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/5b8ff677c4.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gradient-to-r from-stone-950 to-slate-950 text-slate-200">
    @include('layouts.navbar')

    <main class="container m-auto">
        @yield('container')
    </main>
</body>

</html>
