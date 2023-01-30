<h1>Fill name</h1>
<form action="{{ url('categories/store') }}" method="POST">
    @csrf
    <input type="text" name="full_name">
    <button type="submit">Save</button>
</form>
@if (isset($name))
<div>
    My name: {{ $name }}
</div>
@endif
