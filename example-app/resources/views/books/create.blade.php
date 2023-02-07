@extends('components.layout')

@section('title', 'Add a new book')

@section('content')

    <h3>Add a new book</h3>

    <form action="{{ url('books/create') }}" method="post" class="row g-3">

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
            <input type="text" name="name" value="{{ old('name') }}" class="form-control
            @error('name') is-invalid @enderror" placeholder="Book name">
        </div>
        <div class="form-group">
            <input type="text" name="category_id" value="{{ old('category_id') }}" class="form-control
            @error('category_id') is-invalid @enderror" placeholder="Category ID">
        </div>
        <div class="form-group">
            <input type="text" name="author_id" value="{{ old('author_id') }}" class="form-control
            @error('author_id') is-invalid @enderror" placeholder="Author ID">
        </div>
        <div class="form-group">
            <input type="text" name="page_count" value="{{ old('page_count') }}" class="form-control
            @error('page_count') is-invalid @enderror" placeholder="Page count">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </form>
@endsection
