<div>
        Kategorijos ID: {{ $category->id }}<br>
        Kategorijos pavadinimas: {{ $category->category_name }}<br>
        Atnaujinta: {{ $category->updated_at }}<br><br>
</div>
<h3>Knygos šioje kategorijoje</h3>
<div>
    @foreach($books as $book)
        Knygos pavadinimas: {{ $book->name }}<br>
        Puslapiu skaicius: {{ $book->page_count }}<br><br>
    @endforeach
</div>
