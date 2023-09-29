<h1>Uredi korisnika: {{$korisnik["ime"]}}</h1>

<form action="{{route('korisnici.update', $korisnik['id'])}}" method="POST">
    @csrf
    @method("PUT")
    <label>Ime</label>
    <input type="text" name="ime" value="{{$korisnik['ime']}}">
    <br>
    <button type="submit">Spremi promjene</button>
</form>

<a href="route('korisnici.index')">Povratak na popis korisnika</a>