<h3>Blogai</h3>
<div>
    @foreach($blogs as $blog)
        Blogo ID: <a href="{{ url('blogs/' . $blog->id) }}"> {{ $blog->id }}</a><br>
        Blogo pavadinimas:  {{ $blog->title}}<br>
        Aprašymas: {{ $blog->description }}<br>
        E-mail: {{ $blog->email }}<br><br>
    @endforeach
</div>
