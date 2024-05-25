@extends('layouts.base') {{-- pour l'heritage de la fille --}}

@section('title', 'Accueil') {{-- pour le titre --}}

@section('content')

<h1 class="text-center">Hera Bougie</h1>
<div
    style="background-image: url(assets/img/fond.png); background-repeat: no-repeat; background-size: cover; max-width: 700px; margin: 0 auto; min-height: 600px;">


    <div class="container">

        <p style="font-size: 24px; padding:150px 0 0 20px; color:#ddc2b7;"><span class="typed"
                data-typed-items="JUST LIGHT IT!"></span>
        </p>
    </div>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const typed = document.querySelector('.typed');
        if (typed) {
            let typed_strings = typed.getAttribute('data-typed-items');
            typed_strings = typed_strings.split(',');
            new Typed('.typed', {
                strings: typed_strings,
                loop: true,
                typeSpeed: 100,
                backSpeed: 50,
                backDelay: 2000
            });
        }
    });
</script>

@endsection