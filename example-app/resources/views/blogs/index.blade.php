<h3>Blogai</h3>
<div>
    @foreach($blogs as $blog)
        Blogo pavadinimas:<a href="{{ url('blogs/show') }}">{{ $blog->title}} </a><br>
        Aprašymas: {{ $blog->description }}<br>
        E-mail: {{ $blog->email }}<br><br>
    @endforeach
</div>
