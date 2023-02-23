@extends('layouts.layout')

@section('title', $category->name)

@section('content')
    <div class="col d-flex justify-content-center" style="width: 60%">
        <div class="card text-bg-dark border-light justify-content-center align-items-center" style="width: 80%;">
            <ul class="list-group list-group-flush text-bg-dark" style="width: 60%;">
                <li class="list-group-item text-bg-dark">
                    <a style="color: white; text-decoration: none" href="{{ url('categories', ['id' => $category->id]) }}">{{ $category->name }}</a>
                </li>
            </ul><br>
            <ul class="list-group list-group-flush text-bg-dark">
                <div class="row row-cols-5 row-cols-md-5 g-4">
                    @foreach($recipes as $recipe)
                        <div class="col card-group" style="width: 100%">
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
                </div><br>
        </ul>
        </div>
    </div>
@endsection
