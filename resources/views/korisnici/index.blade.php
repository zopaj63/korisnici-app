<h1>Lista korisnika</h1>
<hr>

<ol>
    @foreach($korisnici as $korisnik)
    <li>
        <form action="/korisnici/{{$korisnik['id']}}/edit" method="GET" style="display:inline">
            <button type="submit">Uredi</button>
        </form>
        <form action="/korisnici/{{$korisnik['id']}}/destroy" method="POST" style="display:inline">
            @csrf
            @method("DELETE")
            <button type="submit">Obriši</button>
        </form>
        <b>ID:</b>  {{$korisnik['id']}},
        <b>Ime:</b>  {{$korisnik['ime']}}

    </li>
    <hr>
    @endforeach
</ol>
<a href="/korisnici/create">Dodaj novog korisnika</a>