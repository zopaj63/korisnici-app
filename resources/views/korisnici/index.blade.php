<h1>Lista korisnika</h1>

<ol>
    @foreach($korisnici as $korisnik)
    <li>ID: {{$korisnik['id']}} Ime: {{$korisnik['ime']}}
        <a href="/korisnici/{{$korisnik['id']}}/edit">UREDI</a>
        <form action="/korisnici/{{$korisnik['id']}}/destroy" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit">Obriši</button>
        </form>
    </li>
    @endforeach
</ol>
<a href="/korisnici/create">Dodaj novog korisnika</a>