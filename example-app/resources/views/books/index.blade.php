
<h1>BookController</h1>

<div>
    Page: {{ $page }}
</div>

<div>
    Name: {{ $name }}
</div>

<div>
    @foreach($products as $product)
        Prekes pavadinimas: {{ $product['product_name'] }}<br>
        Kaina: {{ $product['price'] }}<br>
    @endforeach
</div>
<div>
    @foreach($books as $book)
        Knygos pavadinimas: {{ $book->name }}<br>
        Puslapiu skaicius: {{ $book->page_count }}<br>
    @endforeach
</div>
