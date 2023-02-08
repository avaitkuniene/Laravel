@extends('components.layout')

@section('title', 'Login')

@section('content')

    <div class="card" style="width: 18rem;">
        <div class="card-header">
            Welcome, {{ $user->name }}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Full name: {{ $user->name }}</li>
            <li class="list-group-item">E-mail: {{ $user->email }}</li>
        </ul>
    </div>
@endsection
