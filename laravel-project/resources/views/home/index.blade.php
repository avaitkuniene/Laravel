@extends('layouts.layout')

@section('title', 'Recipes')

@section('content')
@include('layouts.success')

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
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
