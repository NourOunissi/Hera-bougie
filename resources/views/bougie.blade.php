@extends('layouts.base')

@section('title', 'Bougies')

@section('content')

<div style="border: solid 1px red; display: flex; flex-direction: row;">
    <h1>Bougies</h1>
    <div style="display: flex; align-items: center; justify-content: space-between; border: solid 1px red; ">
        <select id="couleur" name="couleur" class="form-select" aria-label="Default select example">
            <option selected value="">Couleur</option>
            <option value="1">Rouge</option>
            <option value="2">Rose</option>
            <option value="3">Blanc</option>
        </select>
        <select id="cire" name="cire" class="form-select" aria-label="Default select example">
            <option selected value="">Cire</option>
            <option value="1">Animal</option>
            <option value="2">Minéral</option>
            <option value="3">Végétal</option>
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
                        Cire: {{ $produit['parfum'] }}</p>

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




<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


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

    document.querySelector('#couleur').addEventListener('change', function () {
        console.log("Couleur = " + this.value);

        $.ajax({
            url: '{{ route('app_bougie') }}',
            type: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                'couleur': document.querySelector('#couleur').value,
                'cire': document.querySelector('#cire').value
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

    document.querySelector('#cire').addEventListener('change', function () {
        console.log("Cire = " + this.value);
    });

</script>


<script src="assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection