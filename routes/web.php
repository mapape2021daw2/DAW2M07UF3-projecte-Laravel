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

Route::get('admin/routes', 'HomeController@admin')->middleware('admin');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/afegirOng', function () {
    return view('afegirOng');
});

/*Rutes associacions*/
Route::get('/mostraOng', function () {
    return view('mostraOng');
});

Route::get('/esborraOng', function () {
    return view('esborraOng');
});

Route::get('esborraOng/esbOng/{id}', function () {
    return view('esborraOng');
});

/*Rutes usuaris*/
Route::get('/listUsers', function () {
    return view('listUsers');
});

Route::get('/deleteUsers', function () {
    return view('deleteUsers');
});

Route::get('deleteUsers/deleteUser/{id}', function () {
    return view('deleteUsers');
});

Route::get('errorAddingUser', function() {
    return view('errorAddingUser');
});

Route::get('errorModifyingUser', function() {
    return view('errorModifyingUser');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*ASSOCIACIONS*/
Route::get('/ongCrudOptions', [App\Http\Controllers\ongctl::class, 'crudOptions'])->name('ongCrudOptions');
Route::get('/mostraOng', [App\Http\Controllers\ongctl::class, 'index'])->name('mostraOng');
Route::get('/afegirOng', [App\Http\Controllers\ongctl::class, 'create'])->name('afegirOng');
Route::post('afegirOng', 'ongctl@afegirOng');
Route::get('/modificaOng', [App\Http\Controllers\ongctl::class, 'renderModify'])->name('modificaOng');
Route::get('/esborraOng', [App\Http\Controllers\ongctl::class, 'renderDelete'])->name('esborraOng');
Route::get('/modifyOngData', [App\Http\Controllers\ongctl::class, 'modifyOngData'])->name('modifyOngData');
Route::post('modifyOngData','ongctl@modifyOngData');
Route::get('esborraOng/esbOng/{id}','ongctl@destroy');

/*SOCIS*/
Route::get('/sociCrudOptions', [App\Http\Controllers\Soci::class, 'crudOptions'])->name('sociCrudOptions');
Route::get('/mostraSocis', [App\Http\Controllers\Soci::class, 'index'])->name('mostraSocis');
Route::get('/afegirSocis', [App\Http\Controllers\Soci::class, 'create'])->name('afegirSocis');
Route::post('afegirSocis', 'Soci@afegirSocis');
Route::get('/modificaSocis', [App\Http\Controllers\Soci::class, 'renderModify'])->name('modificaSocis');
Route::get('/esborraSocis', [App\Http\Controllers\Soci::class, 'renderDelete'])->name('esborraSocis');
Route::get('/modifySocisData', [App\Http\Controllers\Soci::class, 'modifySocisData'])->name('modifySocisData');
Route::post('modifySocisData','Soci@modifySocisData');
Route::get('esborraSocis/esbSocis/{nif}','Soci@destroy');

/*USUARIS*/
Route::get('/usersCrudOptions', [App\Http\Controllers\Users::class, 'crudOptions'])->name('usersCrudOptions');
Route::get('/listUsers', [App\Http\Controllers\Users::class, 'index'])->name('listUsers');
Route::get('/addUsers', [App\Http\Controllers\Users::class, 'create'])->name('addUsers');
Route::get('/modifyUsers', [App\Http\Controllers\Users::class, 'renderModify'])->name('modifyUsers');
Route::get('/deleteUsers', [App\Http\Controllers\Users::class, 'renderDelete'])->name('deleteUsers');
Route::get('/modifyUserData', [App\Http\Controllers\Users::class, 'modifyUserData'])->name('modifyUserData');
Route::post('addUser', 'Users@addUser');
Route::post('modifyUserData','Users@modifyUserData');
Route::get('/errorAddingUser', [App\Http\Controllers\Users::class, 'addUserError'])->name('addUserError');
Route::get('/errorModifyingUser', [App\Http\Controllers\Users::class, 'errorModifyingUser'])->name('errorModifyingUser');
Route::get('deleteUsers/deleteUser/{id}','Users@destroy');

/*WORKERS*/
Route::get('/crudOptionsWorkers', [App\Http\Controllers\Worker::class, 'crudOptions'])->name('crudOptionsWorkers');
Route::get('/listWorkers', [App\Http\Controllers\Worker::class, 'index'])->name('listWorkers');
Route::get('/addWorkers', [App\Http\Controllers\Worker::class, 'create'])->name('addWorkers');
Route::get('/modifyWorkers', [App\Http\Controllers\Worker::class, 'renderModify'])->name('modifyWorkers');
Route::get('/deleteWorkers', [App\Http\Controllers\Worker::class, 'renderDelete'])->name('deleteWorkers');
Route::get('/deleteWorkers/deleteWorker/{nif}','Worker@destroy');
Route::post('addWorker','Worker@addWorker');
Route::post('modifyWorker','Worker@modifyWorker');
