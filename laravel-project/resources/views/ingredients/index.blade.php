@extends('layouts.layout')

@section('title', 'Ingredients')

@section('content')
    <div class="col d-flex justify-content-center" style="width: 60%">
        <div class="card text-bg-dark border-light justify-content-center align-items-center" style="width: 80%;">
            <ul class="list-group list-group-flush text-bg-dark" style="width: 60%;">
                <li class="list-group-item text-bg-dark">
                    <a href="{{ url('ingredients/create') }}" class="btn btn-outline-light">Add new ingredient</a>
                </li>
                @foreach($ingredients as $ingredient)
                    <li class="list-group-item text-bg-dark">
                        <a href="{{ route('ingredients.edit', ['id' => $ingredient->id]) }}" class="btn btn-outline-light">Edit</a>
                        <a style="color: white; text-decoration: none" href="{{ url('ingredients', ['id' => $ingredient->id]) }}">
                            {{ $ingredient->id }}. {{ $ingredient->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div><br>
    <div class="col d-flex justify-content-left">
        {{ $ingredients->links() }}
    </div>
@endsection
