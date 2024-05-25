<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - @yield('title') </title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.10/typed.min.js"
        integrity="sha512-hIlMpy2enepx9maXZF1gn0hsvPLerXoLHdb095CmRY5HG3bZfN7XPBZ14g+TUDH1aGgfLyPHmY9/zuU53smuMw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <body>


        {{-- Barre de navigation --}}
        @include('components.navbar')

        {{-- tout le contenu des pages qui heriteront de cette page seront contenu dans la varible @yield que j'ai nommé
        content --}}
        <div class="container" style="margin-top: 120px;">
            @yield('content')
        </div>

        {{-- inclure js --}}
        @include('script')

        {{-- footer --}}
        <div
            style="position: fixed; bottom: 0; width: 100%; text-align: center; background-color: #f0f0f0; padding: 10px;">
            <p> {{now()->format('Y') }} Hera Bougie. Tous droits réservés.</p>
        </div>

    </body>

</html>