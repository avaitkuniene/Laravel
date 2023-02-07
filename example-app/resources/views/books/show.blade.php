@extends('components.layout')

@section('title', 'Show book')

@section('content')

    <div>
        Book name: {{ $book->name}}<br>
        Page count: {{ $book->page_count }}<br>
        Author name: {{ $book->author->name }}<br>
        Author last name: {{ $book->author->last_name }}<br>
        Category: {{ $book->category->category_name }}<br><br>
    </div>

@endsection
