@extends('components.layout')

@section('title', 'Edit '. $book->name)

@section('content')
    <h1>Book {{ $book->name }} edit form</h1>

    <form action="{{ route('books.edit', ['id' => $book->id]) }}" method="post" class="row g-3">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf

            <div class="form-group">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Book name">
            </div>
            <div class="form-group">
                <input type="text" name="category_id" value="{{ old('category_id') }}" class="form-control @error('category_id') is-invalid @enderror" placeholder="Category ID">
            </div>
            <div class="form-group">
                <input type="text" name="author_id" value="{{ old('author_id') }}" class="form-control @error('author_id') is-invalid @enderror" placeholder="Author ID">
            </div>
            <div class="form-group">
                <input type="text" name="page_count" value="{{ old('page_count') }}" class="form-control @error('page_count') is-invalid @enderror" placeholder="Page count">
            </div>

        <div class="col-12">
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </form>


@endsection
