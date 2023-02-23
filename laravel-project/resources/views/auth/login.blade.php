@extends('layouts.layout')

@section('title', 'Login')

@section('content')
    @include('layouts.success')

<form action="{{ route('authenticate') }}" method="post">
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
                <h3>Sign in</h3><br>
            </div>
            <div class="form-group" style="width: 60%;">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       value="{{ old('name') }}">
            </div><br>
            <div class="form-group" style="width: 60%;">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-check" style="width: 60%;">
                <input name="remember" value="1" type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <button type="submit" class="btn btn-outline-light">Submit</button><br>
        </div>
    </div>
</form>
@endsection
