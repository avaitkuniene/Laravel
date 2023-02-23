@if ($message = Session::get('success'))
    <div class="alert alert-light">
        <p>{{ $message }}</p>
    </div>
@endif
