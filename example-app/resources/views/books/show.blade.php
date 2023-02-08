@extends('components.layout')

@section('title', 'Show book')

@section('content')

    <div>
        Book name: {{ $book->name}}<br>
        Page count: {{ $book->page_count }}<br>
        Author name: @if ($book->author){{ $book->author->name }}<br>
        Author last name: {{ $book->author->last_name }}@endif<br>
        Category: @if ($book->category){{ $book->category->category_name }}@endif<br><br>
    </div>

@endsection
