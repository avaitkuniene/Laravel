@extends('layouts.layout')

@section('title', 'Register')

@section('content')
    @include('layouts.success')
    <form action="{{ url('register') }}" method="post">
        <div class="col d-flex justify-content-center" style="width: 60%">
            <div class="card text-bg-dark border-light justify-content-center align-items-center" style="width: 80%;">
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
                <div class="form-group text-center" style="width: 60%;">
                    <h3>Register</h3><br>
                </div>
                    <div class="form-group" style="width: 60%;">
                        <label for="name">Your name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control
            @error('name') is-invalid @enderror">
                    </div><br>
                    <div class="form-group" style="width: 60%;">
                        <label for="email">Your e-mail</label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control
            @error('email') is-invalid @enderror" id="email">
                    </div><br>
                    <div class="form-group" style="width: 60%;">
                        <label for="password">Your password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div><br>
                    <div class="form-group" style="width: 60%;">
                        <label for="password_confirmation">Confirm password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                    </div><br>
                    <div class="form-group" style="width: 60%;">
                        <label for="role" class="form-label">Select your role</label>
                        <select name="role" class="form-control">
                            <option name="role" value="Customer">Customer</option>
                            <option name="role" value="Admin">Admin</option>
                        </select><br>
                    </div>
                    <div class="form-group" style="width: 60%;">
                        <button type="submit" class="btn btn-outline-light">Register</button>
                    </div><br>
            </div>
        </div>
    </form>
@endsection
