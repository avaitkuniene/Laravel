@extends('components.layout')

@section('title', 'Add a new book')

@section('content')

    <h3>Add a new book</h3>

    <form action="{{ url('books/create') }}" method="post" class="row g-3" enctype="multipart/form-data">

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
        <div class="col-12">
            <div class="form-group">
                <label class="form-label">Book name:</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control
                @error('name') is-invalid @enderror" placeholder="Book name">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="form-label">Page count:</label>
                <input type="text" name="page_count" value="{{ old('page_count') }}" class="form-control
            @error('page_count') is-invalid @enderror" placeholder="Page count">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="form-label">Author:</label>
                <select name="author_id[]" class="form-control" multiple>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->full_name }}</option>
                    @endforeach
                </select><br>
                <div class="row">
                    <div class="col">
                        <a href="{{ url('authors/create') }}" class="btn btn-primary">Add new author</a>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label">Category:</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select><br>
                    <div class="row">
                        <div class="col">
                            <a href="{{ url('categories/create') }}" class="btn btn-primary">Add new category</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">File</label>
                <input type="file" name="image" class="form-control">
            </div>
        <div class="col-12">
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </form>
@endsection
