@extends('layouts.layout')

@section('title', 'Add a new recipe')

@section('content')

    <form action="{{ url('recipes/create') }}" method="post" class="row g-3" enctype="multipart/form-data">
        @include('layouts.error')
        @include('layouts.success')
        @csrf
        <div class="card mb-3 text-bg-dark border-light">
            <div class="card-body">
                <div class="form-group">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Recipe name:</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control
                    @error('name') is-invalid @enderror" placeholder="Recipe name">
                </div>
                <div class="form-group">
                    <label class="form-label">Ingredients:</label>
                    <select name="ingredient_id[]" class="form-control" multiple>
                        @foreach($ingredients as $ingredient)
                            <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Category:</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Description:</label>
                    <textarea type="text" name="description" value="{{ old('description') }}" class="form-control
                    @error('description') is-invalid @enderror" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="is_active" class="form-check-input" value="1" @if (old('is_active')) checked @endif>
                    <label class="form-check-label">Active?</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-light">Save</button>
                </div>
            </div>
        </div>
    </form>
@endsection
