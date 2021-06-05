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
    return view('Contenido');
})->name('Inicio');


Auth::routes();
Route::resource('Articulos','ArticulosController');

Route::get('/registrar',function (){
    return view('auth/register');
})->name('registar');


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/Mujeres', 'ArticulosController@indexMujer')->name('Mujeres');
Route::get('/Hombre', 'ArticulosController@indexHombre')->name('Hombre');
Route::get('/Children', 'ArticulosController@indexChildren')->name('Niños');
Route::get('/Accesorios', 'ArticulosController@indexAccesorios')->name('Accesorios');
