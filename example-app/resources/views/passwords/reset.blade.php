@extends('components.layout')

@section('title', 'Reset password')

@section('content')

    <h3>Change your password</h3><br>

    <form action="{{ url('reset') }}" method="post" class="row g-3">

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
            <label for="old_password">Your current password</label>
            <input type="password" name="old_password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="password">Your new password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm new password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-info">Change password</button>
        </div>
    </form>
@endsection
