<h3>Autoriai</h3>
<div>
    @foreach($authors as $author)
        Autoriaus vardas: {{ $author->name}}<br>
        Autoriaus pavardė: {{ $author->last_name }}<br>
        Autoriaus gimimo metai: {{ $author->date_of_birth }}<br>
        Šalis: {{ $author->country }}<br><br>
    @endforeach
</div>
