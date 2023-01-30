<h3>Kategorijos</h3>
<div>
    @foreach($categories as $category)
        Kategorijos ID: {{ $category->id }}<br>
        Kategorijos pavadinimas: {{ $category->category_name }}<br>
        Atnaujinta: {{ $category->updated_at }}<br><br><br>
    @endforeach
</div>
