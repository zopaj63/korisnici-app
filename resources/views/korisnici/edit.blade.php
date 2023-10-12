<h1>Uredi korisnika: {{$korisnik['ime']}}</h1>

<form action="/korisnici/{{$korisnik['id']}}/update" method="POST">
    @csrf
    @method("PUT")
    <label>Ime</label>
    <input type="text" name="ime" value="{{$korisnik['ime']}}">
    <br><br>
    <button type="submit">Spremi promjene</button>
</form>

<a href="/korisnici">Povratak na popis korisnika</a>