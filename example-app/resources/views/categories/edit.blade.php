@extends('components.layout')

@section('title', 'Edit '. $category->category_name)

@section('content')
<h1>Category {{ $category->category_name }} edit form</h1>

<form action="{{ route('category.edit', ['id' => $category->id]) }}" method="post" class="row g-3">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @csrf
        <div class="col-12">
            <label class="form-label">Category name:</label>
            <input type="text" name="category_name" placeholder="Category name" value="{{ old("category_name", $category->category_name) }}" class="form-control @error('category_name') is-invalid @enderror">
            @error('category_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <input type="checkbox" name="enabled" class="form-check-input" value="1" @if (old('enabled')) checked @endif>
            <label class="form-check-label">Enabled?</label>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-info">Save</button>
        </div>
</form>
@endsection
