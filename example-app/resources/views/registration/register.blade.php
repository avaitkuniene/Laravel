@extends('components.layout')

@section('title', 'Registrate')

@section('content')

    <h3>Sign up</h3><br>

    <form action="{{ url('register') }}" method="post" class="row g-3">

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
            <label for="name">Your name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control
            @error('name') is-invalid @enderror">
        </div>
        <div class="form-group">
            <label for="email">Your e-mail</label>
            <input type="text" name="email" value="{{ old('email') }}" class="form-control
            @error('email') is-invalid @enderror" id="email">
        </div>
        <div class="form-group">
            <label for="password">Your password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
        </div>
        <div class="form-group">
            <label for="role" class="form-label">Select your role</label>
            <select name="role" class="form-control">
                <option name="role" value="Customer">Customer</option>
                <option name="role" value="Admin">Admin</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-info">Register</button>
        </div>
    </form>
@endsection
