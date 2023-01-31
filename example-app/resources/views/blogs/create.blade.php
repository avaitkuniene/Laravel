<h1>Užpildykite formą naujam Blog</h1>
<form action="{{ url('blogs/create') }}" method="POST">
    @csrf
    Pavadinimas <input type="text" name="title"><br><br>
    Aprasymas <input type="text" name="description"><br><br>
    E-mail <input type="email" name="email"><br><br>
    <button type="submit">Save</button>
</form>
