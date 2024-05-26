@extends('layouts.base')
@vite('resources/css/panier.css')

@section('title', 'Panier d\'achat')

@section('content')
    <h1>Panier</h1>

    <!-- Panier vide -->
    @if (count($cartItems) === 0)
        <p>Votre panier est vide</p>
        <a href="{{ route('app_bougie') }}">Retour à la boutique</a>

    <!-- Panier pas vide -->
    @else
    <section class="h-100 h-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">

                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <h1 class="fw-bold mb-0 text-black">Panier d'achat </h1>
                                    <h6 class="mb-0 text-muted">{{ count($cartItems) }} items</h6>
                                </div>
                                <hr class="my-4">


                                @foreach ($cartItems as $item)
                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="/assets/img/{{ $item['image'] }}" class="img-fluid rounded-3"
                                                alt="{{ $item['nom'] }}">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h6 class="text-muted">article</h6>
                                            <h6 class="text-black mb-0">{{ $item['nom'] }}</h6>
                                        </div>

                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h6 class="text-muted">quantité</h6>
                                            <!-- <h6 class="text-black mb-0">{{ $item['quantity'] }}</h6> -->
                                            <input type="number" min="1" class="form-control" value="{{ $item['quantity'] }}"
                                                data-item-price="{{ $item['price'] }}"
                                                onchange="updateItemQuantity(this)">
                                        </div>


                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h6 class="mb-0 item-price" data-item-price="{{ $item['price'] }}">€ {{ $item['price'] * $item['quantity'] }}</h6>
                                            <button class="btn btn-light" onclick="clearBougieArticle(this)"
                                                data-article-id="{{ $item['id'] }}">Supprimer</button>


                                        </div>

                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                @endforeach

                                <div class="pt-5">
                                    <button class="btn btn-light" onclick="clearBougie()">Vider le panier</button>
                                    <h6 class="mb-0"><a href="/bougie" class="text-body"><i
                                                class="fas fa-long-arrow-alt-left me-2"></i>
                                            Retour à la boutique</a></h6>

                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Résumé</h3>
                                    <hr class="my-4">



                                    <h5 class="text-uppercase mb-3">Shopping</h5>





                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Prix Total</h5>
                                        <h5 id="totalPrice">€ {{ $totalPrice }} </h5>
                                    </div>

                                    @if (auth()->check())
                                        <form action="{{ route('passer-commande') }}" method="post">
                                            @csrf
                                            <button id="passCommandButton" type="submit"
                                                class="btn btn-light btn-light btn-lg">Passer la commande</button>
                                        </form>
                                    @else
                                        <p>Connectez-vous pour passer une commande.</p>
                                    @endif



                                </div>
                            </div>

                            <div class="card mb-4 mb-lg-0">
                                <div class="card-body">
                                    <p><strong>We accept</strong></p>
                                    <div class="svg-container">
                                        <img class="me-2" width="45px"
                                            src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                                            alt="Visa" />
                                        <img class="me-2" width="45px"
                                            src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                                            alt="American Express" />
                                        <img class="me-2" width="45px"
                                            src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                                            alt="Mastercard" />

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

</section>
@endsection
<script>
    function clearBougie() {
        fetch('{{ route('clear-bougie') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => response.json())
            .then(data => {
                //alert(data.message);

                // Rechargez la page côté client
                location.reload();
            })
            .catch(error => {
                console.error('Erreur lors de la suppression du panier :', error);
            });

    }
</script>

<script>
    function clearBougieArticle(button) {
        if (!confirm('Êtes-vous sûr de vouloir supprimer cet article ?'))
            return;

        var produitsId = button.getAttribute('data-article-id'); // Correction de l'attribut à récupérer


        fetch('{{ route('clear-bougie-article') }}', { // Utilisez la fonction route() pour générer l'URL de la route
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    produits_id: produitsId
                })
            })
            .then(response => response.json())
            .then(data => {
               // alert(data.message);

                // Rechargez la page côté client si la suppression a réussi
                if (!data.error) {
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Erreur lors de la suppression de l\'article :', error);
            });
    }
</script>



<script>
    function updateItemQuantity(input) {
        // Obtenez les valeurs nécessaires
        var newQuantity = parseInt(input.value);
        var pricePerItem = parseFloat(input.getAttribute("data-item-price"));

        // Vérifiez si la nouvelle quantité est un nombre valide
        if (!isNaN(newQuantity) && newQuantity >= 0) {
            // Recherchez l'élément avec la classe "item-price" dans le même parent que l'input
            var itemPriceElement = input.closest('.row').querySelector(".item-price");

            // Assurez-vous que l'élément existe avant de mettre à jour le contenu
            if (itemPriceElement) {
                // Calculez le nouveau total en multipliant la quantité par le prix unitaire
                var newTotal = newQuantity * pricePerItem;

                // Mettez à jour l'affichage du prix
                itemPriceElement.textContent = "€ " + newTotal.toFixed(2);

                // Mettez à jour l'attribut data-item-price avec le prix unitaire
                input.setAttribute("data-item-price", pricePerItem.toFixed(2));

                // Mettez à jour le prix total
                updateTotalPrice();
            }
        } else {
            // Remettez la quantité à 0 si la nouvelle quantité n'est pas valide
            input.value = 0;
        }
    }

    function updateTotalPrice() {

        // Sélectionnez tous les éléments avec la classe "item-price" et additionnez les montants
        var itemPrices = document.querySelectorAll('.item-price');
        var totalPrice = 0;


        itemPrices.forEach(function(itemPrice) {
            totalPrice += parseFloat(itemPrice.textContent.replace('€ ', ''));
        });


        // Mettez à jour l'élément affichant le prix total
        document.querySelector('#totalPrice').textContent = "€ " + totalPrice.toFixed(2);
    }
</script>

<script>
    function passerCommande() {

fetch('{{ route("passer-commande") }}', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
})
    .then(response => response.json())
    .then(data => {

        // Videz le panier si la commande a été passée avec succès
        if (!data.error) {
            alert(data.message);
            viderPanier();
            //showOrderConfirmation();
        } else {
            alert(error.message);
        }
    })
}
</script>

</body>

</html>
