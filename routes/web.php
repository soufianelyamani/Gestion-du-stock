<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeVenteController;
use App\Http\Controllers\TypeProduitController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\CommandeAchatController;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::resource('clients', ClientController::class);
Route::resource('commandeVentes', CommandeVenteController::class);
Route::resource('typeProduits', TypeProduitController::class);
Route::resource('produit', ProduitController::class);
Route::resource('fournisseur', FournisseurController::class);
Route::resource('commandeAchat', CommandeAchatController::class);
Route::resource('users', userController::class);
// search
// Route::get('/','SearchController@index');

Route::get('/search',[ClientController::class,'search']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');