@extends('layouts.layout')

@section('title', $ingredient->name)

@section('content')
    <div class="col d-flex justify-content-center" style="width: 60%">
        <div class="card text-bg-dark border-light justify-content-center align-items-center" style="width: 80%;">
            <ul class="list-group list-group-flush text-bg-dark" style="width: 60%;">
                <li class="list-group-item text-bg-dark">
                    <a style="color: white; text-decoration: none" href="{{ url('ingredients', ['id' => $ingredient->id]) }}">{{ $ingredient->name }}</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
