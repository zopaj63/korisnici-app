<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KorisniciController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// prikaz svih korinsnika
Route::get("/korisnici", [KorisniciController::class, "index"]); // index je naziv metode iz controllera

// prikaz forme za stvarnje korisnika
Route::get("/korisnik/create",[KorisniciController::class, "create"]);

// spremanje novog korisnika
Route::post("/korisnici", [KorisniciController::class, "store"]);

// prikaz forme za uređivanje korisnika
Route::get("/korisnik/{id}/edit", [KorisniciController::class, "edit"] );

// ažuriranje korisnika
//Route::post("/korisnik/{id}/edit", [KorisniciController::class, "update"]);
Route::put("/korisnik/{id}", [KorisniciController::class, "update"]);

// brisanje korisnika
Route::delete("/korisnik/{id}", [KorisniciController::class, "destroy"]);

// ako je ispod 18, redirekt na stranicu s porukom ili samo poruka:
Route::get("/under18", function()
{
    return "Nemate 18 godina";
});

// middleware kontrola (prvo se provjerava dob, zatim se otvara stranica welcome)
Route::get("/welcome", function()
{
    return "Dobrodošli, čini se imate preko 18 godina.";
})->middleware('agecheck'); //pozivanje middlewarea