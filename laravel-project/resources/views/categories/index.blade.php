@extends('layouts.layout')

@section('title', 'Categories')

@section('content')
    <div class="col d-flex justify-content-center" style="width: 60%">
    <div class="card text-bg-dark border-light justify-content-center align-items-center" style="width: 80%;">
        <ul class="list-group list-group-flush text-bg-dark" style="width: 60%;">
            @if(Auth::check() && Auth::user()->role == "Admin")
            <li class="list-group-item text-bg-dark">
                <a href="{{ url('categories/create') }}" class="btn btn-outline-light">Add new category</a>
            </li>
            @endif
            @foreach($categories as $category)
                <li class="list-group-item text-bg-dark">
                    @if(Auth::check() && Auth::user()->role == "Admin")
                    <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-outline-light">Edit</a>
                    @endif
                    <a style="color: white; text-decoration: none" href="{{ url('categories', ['id' => $category->id]) }}">
                    {{ $category->id }}. {{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    </div><br>
    <div class="col d-flex justify-content-left">
        {{ $categories->links() }}
    </div>
@endsection
