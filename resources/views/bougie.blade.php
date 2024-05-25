@extends('layouts.base')

@section('title', 'Bougies')

@section('content')

<div style="display: flex; flex-direction: row;">
    <h1>Bougies</h1>
    <div style="display: flex; align-items: center; justify-content: space-between; gap:20px;margin-left: 20px;">
        
    <!-- Couleurs -->
        <select id="couleur" name="couleur" class="form-select" aria-label="Default select example" style="width: 150px;">
            <option selected value=""></option>
            @foreach ($couleurs as $couleur)
                <option value="{{ $couleur['id'] }}" @if ($couleur['id'] == $couleurId) selected @endif>{{ $couleur['nom'] }}</option>
            @endforeach
        </select>

        <!-- Cires -->
        <select id="cire" name="cire" class="form-select" aria-label="Default select example" style="width: 150px;">
            <option selected value=""></option>
            @foreach ($cires as $cire)
                <option value="{{ $cire['id'] }}" @if ($cire['id'] == $cireId) selected @endif>{{ $cire['nom'] }}</option>
            @endforeach
        </select>

    </div>
</div>
<div class="row row-cols-1 row-cols-md-4 g-4">

    @foreach ($produits as $produit)
        <div class="col mb-4">
            <div class="card text-white bg-burlywood mb-2"
                style="max-width: 18rem; background-color: rgba(178, 128, 113, 1)">
                <img src="/assets/img/{{ $produit['image'] }}" class="card-img-top" alt="...">
                <div class="card-header">{{ $produit['nom'] }}</div>
                <div class="card-body">

                    <p class="card-title">{{ $produit['description'] }} </p>

                    <p class="card-text">Prix: {{ $produit['prix'] }} € <br />
                        En stock: {{ $produit['stock'] }} <br />
                        Couleur: {{ $produit['couleur'] }}<br />
                        Parfum: {{ $produit['parfum'] }}<br />
                        Cire: {{ $produit['cire'] }}</p>

                    <div class="row">
                        <div class="col-md-9 col-lg-9 col-xl-9">
                            <h6 class="text-muted">Quantité</h6>
                            <input type="number" min="1" class="form-control" value="1" id="quantity{{ $produit['id'] }}">
                        </div>
                    </div>
                    <br>

                    <button class="btn btn-outline-dark mt-auto addToCart" data-produit-id="{{ $produit['id'] }}">Ajouter au
                        panier</button>


                </div>
            </div>
        </div>
    @endforeach

</div>

<script>
    $(document).on('click', '.addToCart', function () {
        // Récupérez l'ID du produit à partir de l'attribut data-produit-id
        let produitId = $(this).data('produit-id');

        // Récupérez la quantité du input correspondant
        let newQuantity = $('#quantity' + produitId).val();



        // Faites une requête Ajax pour ajouter le produit au panier
        $.ajax({
            url: '{{ route('addToCart') }}',
            type: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                'produit_id': produitId,
                'quantity': newQuantity
            },
            success: function (response) {
                alert(response
                    .message); // Vous pouvez personnaliser cela en fonction de vos besoins
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    // Chargement et synchronisation du combobox couleur
    document.querySelector('#couleur').addEventListener('change', function () {
        document.location.href = '{{ route('app_bougie') }}?couleur=' + this.value +
            '&cire=' + document.querySelector('#cire').value;
    });

    // Chargement et synchronisation du combobox cire
    document.querySelector('#cire').addEventListener('change', function () {
        document.location.href = '{{ route('app_bougie') }}?couleur=' + document.querySelector('#couleur').value +
            '&cire=' + this.value;
    });

</script>
@endsection