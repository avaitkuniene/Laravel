<html>
<head>
    @include('layouts.head')
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-4" style="background-color: #ffffff ;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Recipe channel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{ url('recipes') }}" class="nav-link" aria-current="page" href="#">All recipes</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('categories') }}" class="nav-link" aria-current="page" href="#">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('ingredients') }}" class="nav-link" aria-current="page" href="#">Ingredients</a>
                </li>
                <li class="nav-item">
                    @if(auth()->user() === null)
                        <a href="{{ url('login') }}" class="nav-link" aria-current="page" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('register') }}" class="nav-link" aria-current="page" href="#">Register</a>
                </li>
                    @endif
                <li class="nav-item">
                    @if (auth()->user())
                        <a href="{{ url('profile') }}" class="nav-link" href="#">Your profile</a>
                </li>
            </ul>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ url('logout') }}" class="btn btn-outline-danger" aria-current="page" href="#" style="color: red">Logout</a>
            </div>
            @endif
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
<footer class="footer">
    <div class="container">
        <span>&copy 2023 Project created by Asta V.</span>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
