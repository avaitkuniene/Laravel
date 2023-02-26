@extends('layouts.layout')

@section('title', 'Profile')

@section('content')

    <form action="{{ url('change') }}" method="post">
        @include('layouts.error')
        @include('layouts.success')
        @csrf
    <div class="col d-flex justify-content-center" style="width: 60%">
        <div class="card text-bg-dark border-light justify-content-center align-items-center" style="width: 80%;">
            <div class="form-group text-center" style="width: 60%;">
                <h3>Welcome, {{ $user->name }}</h3>
            </div>
            <div class="form-group" style="width: 60%;">
                <label for="exampleInputEmail1">Your e-mail address</label>
                <h5>{{ $user->email }}</h5>
            </div><br>
            <div class="form-group" style="width: 60%;">
                <label for="exampleInputEmail1">Your role</label>
                <h5>{{ $user->role}}</h5>
            </div><br>

            <div class="form-group text-center" style="width: 60%;">
                <h3>Change your password</h3><br>
            </div>
            <div class="form-group" style="width: 60%;">
                <label for="old_password">Your current password</label>
                <input type="password" name="old_password" class="form-control" id="password">
            </div><br>
            <div class="form-group" style="width: 60%;">
                <label for="password">Your new password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div><br>
            <div class="form-group" style="width: 60%;">
                <label for="password_confirmation">Confirm new password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
            </div><br>
            <div class="form-group" style="width: 60%;">
                <button type="submit" class="btn btn-outline-light">Change password</button>
            </div><br>
        </div>
    </div>
    </form>
        </div>
    </div>
@endsection
