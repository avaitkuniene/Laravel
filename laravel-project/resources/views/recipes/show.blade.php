@extends('layouts.layout')

@section('title', $recipe->name)

@section('content')

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
                        <h5 class="card-title text-center">
                            <a class="text-white text-center" href="{{ url('recipes', ['id' => $recipe->id]) }}">{{ $recipe->name }}</a>
                        </h5>
                        <p class="card-text text-center">@if ($recipe->category){{ $recipe->category->name }}@endif</p>
                        @if ($recipe->ingredients)
                            <ul>
                                @foreach($recipe->ingredients as $ingredient)
                                    <li>{{ $ingredient->name }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <p class="card-text">{{ $recipe->description }}</p>
                    </div>
                </div>
            </div>
        </div>
@endsection
