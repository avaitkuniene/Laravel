@extends('components.layout')

@section('title', 'Edit '. $author->name)

@section('content')
    <h1>Author {{ $author->name }} edit form</h1>

    <form action="{{ route('authors.edit', ['id' => $author->id]) }}" method="post" class="row g-3">

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

            <div class="form-group">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Author name">
            </div>
            <div class="form-group">
                <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Author last name">
            </div>
            <div class="form-group">
                <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control @error('date_of_birth') is-invalid @enderror" placeholder="Date of birth">
            </div>
            <div class="form-group">
                <input type="text" name="country" value="{{ old('country') }}" class="form-control @error('country') is-invalid @enderror" placeholder="Country">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
    </form>


@endsection
