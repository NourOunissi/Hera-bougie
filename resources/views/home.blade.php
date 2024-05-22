@extends('layouts.base') {{-- pour l'heritage de la fille --}}

@section('title', 'Accueil') {{-- pour le titre --}}

@section('content')

<div id="home" class="hero route bg-image" style="background-image: url(assets/img/fond.png);" >
    <div class="hero-content display-table">
        <div class="table-cell">
            <div class="container">
                <h1 class="hero-title mb-4">Hera Bougie</h1>
                <p class="hero-subtitle"><span class="typed" data-typed-items="JUST LIGHT IT!"></span></p>
            </div>
        </div>
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
