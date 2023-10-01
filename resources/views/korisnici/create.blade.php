<h1>Dodaj novog korisnika</h1>

<form action="/korisnici/store" method="POST">
    @csrf
    @method("PUT")
    <label>Ime: </label>
    <input type="text" name="ime">
    <br><br>
    <button type="submit">Spremi</button>
</form>

<a href="/korisnici">Povratak na popis korisnika</a>