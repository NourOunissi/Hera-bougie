<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - @yield('title') </title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/app.css') }}">

</head>

<body>

    <body class="mt-4">


        {{-- Barre de navigation --}}
        @include('components.navbar')

        {{-- tout le contenu des pages qui heriteront de cette page seront contenu dans la varible @yield que j'ai nommé content --}}
        <div class="container mt-4">
            @yield('content')
        </div>  
        {{-- inclure js --}}
        @include('script')

        <br><br><br><br><br><br>
        <div style="position: fixed; bottom: 0; width: 100%; text-align: center; background-color: #f0f0f0; padding: 10px;">
            <p>&copy; <?php echo date('Y'); ?> Hera Bougie. Tous droits réservés.</p>
        </div>

    </body>

</html>
