<div>
    Autoriaus vardas: {{ $author->name}}<br>
    Autoriaus pavardė: {{ $author->last_name }}<br>
    Autoriaus gimimo metai: {{ $author->date_of_birth }}<br>
    Šalis: {{ $author->country }}<br><br>
</div>
<h3>Šio autoriaus parašytos knygos:</h3>
<div>
    @foreach($books as $book)
        Knygos pavadinimas: {{ $book->name }}<br>
        Puslapiu skaicius: {{ $book->page_count }}<br><br>
    @endforeach
</div>
