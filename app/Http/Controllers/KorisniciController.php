<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KorisniciController extends Controller
{
    // ubacujemo asocijativni niz umjesto baze
    private $korisnici=[
        ["id"=>1, "ime"=>"Slobodan"],
        ["id"=>2, "ime"=>"Prijevoz"]
    ];

    // metoda za prikaz korisnika
    public function index()
    {
        return view("korisnici.index", ["korisnici"=>$this->korisnici]); // key i value (umjesto compact)
    }

    // prikaz forme za unos
    public function create()
    {
        return view("korisnici.create");
    }

    // spremanje podataka za unos
    public function store(Request $request)
    {
        $noviID=count($this->korisnici)+1; // izračun slijedećeg id-a
        $this->korisnici[]=["id"=>$noviID, "ime"=>$request->ime]; // novi ID i novo ime s forme
        return view("korisnici.index", ["korisnici"=>$this->korisnici]); // nakon spremanja vraćanje na početak, popis korisnika
    }

    // prikaz forme za promjenu podataka (korisnika s određenim id)
    public function edit($id)
    {
        $korisnik=array_filter($this->korisnici, function($korisnik) use ($id) // filtrira vrijednosti niza pomoću callback funkcije, da nađemo određeni id
        {
            return $korisnik["id"]==$id; // vraća korisnika s traženim id
        });
        // pozivamo formu edit, popunjenu s prosljeđenim podatkom (ako ga nema vraća NULL)
        return view("korisnici.edit", ["korisnik"=>array_shift($korisnik)]); // uklanja prvi element iz niza i vraća ga (ispisuje)
    }

    // spremanje promjene podatka unesene u edit
    public function update (Request $request, $id)
    {
        foreach ($this->korisnici as $korisnik)
        {
            if ($korisnik["id"]==$id)
            {
                $korisnik["ime"]=$request->ime; // kad naiđe na isti id spremi podatak i prekidamo s break da se ne vrti do kraja
                $this->korisnici[$id]=["id"=>$id, "ime"=>$request->ime];
            }
        }
        return view("korisnici.index", ["korisnici"=>$this->korisnici]);
    }

    // brisanje podatka s određenim id
    public function destroy($id)
    {
        $this->korisnici=array_filter($this->korisnici, function($korisnik) use ($id)
        {
            return $korisnik['id']!==$id; //zadržati sve one koji nemaju poslani id
        });
        // ako je id različit od poslanog, podatak ostaje u nizu, ako je isti, podatak se briše

        return view("korisnici.index", ["korisnici"=>$this->korisnici]);
    }


}
