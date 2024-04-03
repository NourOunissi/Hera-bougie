@extends('layouts.base')

@section('title', 'Bougies')

@section('content')

    <h1>Bougies</h1>
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
                            Cire: {{ $produit['parfum'] }}</p>

                        <div class="row">
                            <div class="col-md-9 col-lg-9 col-xl-9">
                                <h6 class="text-muted">Quantité</h6>
                                <input type="number" min="1" class="form-control" value="1"
                                    id="quantity{{ $produit['id'] }}">
                            </div>
                        </div>
                        <br>

                        <button class="btn btn-outline-dark mt-auto addToCart"
                            data-produit-id="{{ $produit['id'] }}">Ajouter au panier</button>


                    </div>
                </div>
            </div>
        @endforeach

    </div>




    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script>
        $(document).on('click', '.addToCart', function() {
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
                success: function(response) {
                    alert(response
                    .message); // Vous pouvez personnaliser cela en fonction de vos besoins
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>


    <script src="assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection
