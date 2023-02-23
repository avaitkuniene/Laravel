@extends('layouts.layout')

@section('title', $category->name)

@section('content')
    <div class="col d-flex justify-content-center" style="width: 60%">
        <div class="card text-bg-dark border-light justify-content-center align-items-center" style="width: 80%;">
            <ul class="list-group list-group-flush text-bg-dark" style="width: 60%;">
                <li class="list-group-item text-bg-dark">
                    <a style="color: white; text-decoration: none" href="{{ url('categories', ['id' => $category->id]) }}">{{ $category->name }}</a>
                </li>
            </ul>
            <ul class="list-group list-group-flush text-bg-dark" style="width: 60%;">
            @foreach($recipes as $recipe)
                <li class="list-group-item text-bg-dark">
                    <a style="color: white; text-decoration: none" href="{{ url('recipes', ['id' => $recipe->id]) }}">{{ $recipe->name }}</a>
                </li>
            @endforeach
        </ul>
        </div>
    </div>
@endsection
