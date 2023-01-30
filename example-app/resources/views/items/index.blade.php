<h1>Produktų sąrašas</h1>
<div>
    @foreach($products as $product)
        Prekės ID: {{ $product['id'] }}<br>
        Prekės pavadinimas: {{ $product['name'] }}<br>
        Kaina: {{ $product['price'] }}<br><br>
    @endforeach
</div>
