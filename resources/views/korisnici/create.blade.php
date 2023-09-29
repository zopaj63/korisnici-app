<h1>Dodaj novog korisnika</h1>

<form action="{{route('korisnici.store')}}" method="POST">
    @csrf
    <label>Ime: </label>
    <input type="text" name="ime">
    <br>
    <button type="submit">Spremi</button>
</form>

<a href="route('korisnici.index')">Povratak na popis korisnika</a> <!--(klasa.motoda)-->