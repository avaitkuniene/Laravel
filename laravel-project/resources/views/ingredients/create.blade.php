@extends('layouts.layout')

@section('title', 'Create new ingredient')

@section('content')

    <div class="col d-flex justify-content-center" style="width: 60%">
        <div class="card text-bg-dark border-light justify-content-center align-items-center" style="width: 80%;">
            <ul class="list-group list-group-flush text-bg-dark" style="width: 60%;">
                <li class="list-group-item text-bg-dark text-center"><h3>Create new ingredient</h3></li><br>
                <form action="{{ url('ingredients/create') }}" method="post" class="row g-3">
                    @include('layouts.error')
                    @include('layouts.success')
                    @csrf
                    <li class="list-group-item text-bg-dark">
                        <label class="form-label">Ingredient name:</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Ingredient name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </li>
                    <li class="list-group-item text-bg-dark">
                        <input type="checkbox" name="is_active" class="form-check-input" value="1" @if (old('is_active')) checked @endif>
                        <label class="form-check-label">Active?</label>
                    </li>
                    <li class="list-group-item text-bg-dark">
                        <button type="submit" class="btn btn-outline-light">Save</button>
                    </li>
                </form>
            </ul>
        </div>
    </div>
@endsection
