<?php

use App\Cadaver;
use Illuminate\Http\Request;

//Ver estimulo
Route::get('/', 'CadaverController@showList')->name('cadaveres');

//Ver cadaveres
Route::get('/cadaver/{id}', 'CadaverController@show')->name('cadaver');

//Hueso nuevo
Route::post('/hueso', 'CadaverController@createBone');

//Ingresar cadaver nuevo
Route::get('/titulo', function (){
    return view('nuevoCadaver');
})->name('nuevo');

//Crear cadaver nuevo
Route::post('/cadaver/nuevo/', 'CadaverController@create');

//ver escena
Route::get('/escena/{id}', 'CadaverController@escena')->name('escena');

Route::auth();

