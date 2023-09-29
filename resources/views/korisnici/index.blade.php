<h1>Lista korisnika</h1>

<ol>
    @foreach($korisnici as $korisnik)
    <li>ID: {{$korisnik['id']}} Ime: {{$korisnik['ime']}}
        <a href="/korisnik/{{$korisnik['id']}}/edit">UREDI</a>
        <form action="/korisnik/{{$korisnik['id']}}/destroy" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit">Obriši</button>
        </form>
    </li>
    @endforeach
</ol>
<a href="/korisnik/create">Dodaj novog korisnika</a>