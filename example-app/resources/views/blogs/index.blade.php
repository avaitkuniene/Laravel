<h3>Blogai</h3>
<div>
    @foreach($blogs as $blog)
        Blogo pavadinimas: {{ $blog->title}}<br>
        Aprašymas: {{ $blog->description }}<br>
        E-mail: {{ $blog->email }}<br><br>
    @endforeach
</div>
