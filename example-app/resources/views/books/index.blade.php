@extends('components.layout')

@section('title', 'Books')

@section('content')
    <h1>Books</h1><br>

    @include('components.alert.success_message')

    <form action="{{ url('books') }}" method="get">
        <div class="col-12">
            <label class="form-label">Book name:</label>
            <input type="text" name="name" class="form-control" value="{{ $name }}" placeholder="Book name">
        </div>
        <div class="col-12">
            <label class="form-label">Category:</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 mt-2">
            <button type="submit" class="btn btn-info">Filter</button>
        </div>
        <div class="col-12 mt-2">
            <a href="{{ url('books') }}" >clear</a>
        </div>

    </form>
    <div class="row">
        <div class="col">
            <a href="{{ url('books/create') }}" class="btn btn-primary">Add a new book</a>
        </div>
    </div><br>

    <table class="table">
        <tr>
            <th scope="col" width="100">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Page count</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col" width="100">Edit</th>
            <th scope="col" width="100">Delete</th>
        </tr>
        @foreach($books as $book)
            <tr>
                <th scope="row">{{ $book->id }}</th>
                <td>
                    <a href="{{ url('books', ['id' => $book->id]) }}">{{ $book->name }}</a>
                </td>
                <td>
                    @if ($book->image)
                        <img src="{{ asset($book->image) }}">
                    @else
                        No image
                    @endif
                </td>
                <td>{{ $book->page_count }}</td>
                <td>@if ($book->authors)
                    @foreach($book->authors as $author)
                        {{ $author->full_name }}
                        @endforeach
                    @endif</td>
                <td>@if ($book->category){{ $book->category->category_name }}@endif</td>
                <td>
                    <a href="{{ route('books.edit', ['id' => $book->id]) }}" class="btn btn-info">Edit</a>
                </td>
                <td>
                    <form action="{{ route('books.delete', ['id' => $book->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="row">
        <div class="col">
            {{ $books->links() }}
        </div>
    </div>
@endsection
