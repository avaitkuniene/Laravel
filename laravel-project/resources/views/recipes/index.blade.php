@extends('layouts.layout')

@section('title', 'Recipes')

@section('content')

    <form action="{{ url('recipes') }}" method="get" style="color: white">
        <div class="col-12" >
            <label class="form-label">Filter by category:</label>
            <select name="category_id" class="form-control" style="width: 100%">
                <option> </option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 mt-2">
            <button type="submit" class="btn btn-outline-light">Filter</button>
            <button onclick="{{ url('recipes') }}" class="btn btn-outline-light">Clear</button>
        </div>
    </form>
    @if(Auth::check() && Auth::user()->role == "Admin")
    <div class="row">
        <div class="col">
            <a href="{{ url('recipes/create') }}" class="btn btn-outline-light">Add a new recipe</a>
        </div>
    </div>
    @endif
    <div class="row row-cols-5 row-cols-md-5 g-4">
        @foreach($recipes as $recipe)
        <div class="col card-group" style="width: 20%">
                <div class="card text-bg-dark border-light" style="width: 15rem;">
                @if ($recipe->image)
                    <img src="{{ asset($recipe->image) }}" class="recipe_img">
                @else
                    No image
                @endif
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a class="text-white text-center" href="{{ url('recipes', ['id' => $recipe->id]) }}">{{ $recipe->name }}</a>
                    </h5>
                    <p class="card-text text-center">{{ $recipe->id }}</p>
                </div>
                <div class="card-body">
                    <p class="card-text text-center">@if ($recipe->category){{ $recipe->category->name }}@endif</p>
                </div>
                    @if(Auth::check() && Auth::user()->role == "Admin")
                <div class="card-footer text-center" >
                    <a style="width: 100%" href="{{ route('recipes.edit', ['id' => $recipe->id]) }}" class="btn btn-outline-light">Edit</a>
                </div>
                    @endif
            </div>
        </div>
        @endforeach
    </div><br>
    <div class="row">
        {{ $recipes->links() }}
    </div>
@endsection
