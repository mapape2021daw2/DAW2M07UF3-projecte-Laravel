<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/afegirOng', function () {
    return view('afegirOng');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/afegirOng', [App\Http\Controllers\ongctl::class, 'create'])->name('afegirOng');

//Route::get('/ong', [App\Http\Controllers\ongctl::class, 'index'])->name('ong');
Route::resource('ong','ongctl');
Route::get('mostraong','ongctl@index');

Route::get('esborra-ong','ongctl@index');
Route::get('esbong/{cif}','ongctl@destroy');