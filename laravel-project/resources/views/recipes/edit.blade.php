@extends('layouts.layout')

@section('title', 'Edit ' . $recipe->name)

@section('content')

    <form action="{{ route('recipes.edit', ['id' => $recipe->id]) }}" method="post" class="row g-3" enctype="multipart/form-data">
        @include('layouts.error')
        @include('layouts.success')
        <div class="card mb-3 text-bg-dark border-light" style="max-width: 90%;">
            <div class="row g-0">
                <div class="col-md-5">
                    @if ($recipe->image)
                        <img src="{{ asset($recipe->image) }}" class="one-recipe-img">
                    @else
                        No image
                    @endif
                </div>
                @csrf
                <div class="col-md-7">
                    <div class="card-body">
                        <div class="col-12">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <h5 class="card-title text-center">
                            <a class="text-white text-center" href="{{ url('recipes', ['id' => $recipe->id]) }}">{{ $recipe->name }}</a>
                        </h5>
                        <div class="form-group">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control
                    @error('name') is-invalid @enderror" placeholder="New recipe name">
                        </div>
                        <p class="card-text text-center">@if ($recipe->category){{ $recipe->category->name }}@endif</p>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @if ($recipe->ingredients)
                            <ul>
                                @foreach($recipe->ingredients as $ingredient)
                                    <li>{{ $ingredient->name }}</li>
                                @endforeach
                            </ul>
                            <select name="ingredient_id[]" class="form-control" multiple>
                                @foreach($ingredients as $ingredient)
                                    <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                @endforeach
                            </select>
                        @endif
                        <p class="card-text">{{ $recipe->description }}</p>
                        <div class="form-group">
                            <input type="text" name="description" value="{{ old('description') }}" class="form-control
                    @error('description') is-invalid @enderror" placeholder="New recipe description">
                        </div><br>
                        <div class="form-group justify-content-center align-items-center">
                            <button type="submit" class="btn btn-outline-light">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
<form action="{{ route('recipes.delete', ['id' => $recipe->id]) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger" style="width: 100%">Delete</button>
</form>
@endsection
