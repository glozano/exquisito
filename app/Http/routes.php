<?php

use App\Cadaver;
use App\Hueso;
use App\Estimulo;
use Illuminate\Http\Request;

//Ver estimulo
Route::get('/', function () {
    $cadaveres = Cadaver::orderBy('created_at', 'asc')->get();
    return view('cadaveres', [
        'cadaveres' => $cadaveres
    ]);
})->name('cadaveres');

//Ver cadaveres
Route::get('/cadaver/{id}', 'CadaverController@show')->name('cadaver');

//Hueso nuevo
Route::post('/hueso', function (Request $request) {
    if(!empty($request->estimulo) && !(empty($request->texto))){
        $cadaver = Cadaver::where('id',$request->cadaver)->first();

        $hueso = new Hueso();
        $hueso->texto = $request->texto;
        $cadaver->huesos()->save($hueso);

        $estimulo = new Estimulo();
        $estimulo->texto = $request->estimulo;
        $hueso->estimulo()->save($estimulo);
    }
    return redirect()->route('cadaver', $request->cadaver);
});

//Ingresar cadaver nuevo
Route::get('/titulo', function (){
    return view('nuevoCadaver');
});

//Crear cadaver nuevo
Route::post('/cadaver/nuevo/', function (Request $request) {
    $cadaver = new Cadaver();
    $cadaver->titulo = $request->titulo;
    $cadaver->llave = $request->llave;
    $cadaver->save();
    return redirect()->route('cadaver', $cadaver->id);
});

//ver escena
Route::get('/escena/{id}', function ($id,Request $request){
    $cadaver = Cadaver::where('id',$id)->first();
    $cadaver->load('huesos');
    if($request->llave == $cadaver->llave){
        return view('escena', [
            'cadaver' => $cadaver,
            'huesos' => $cadaver->huesos,
        ]);
    }else{
        return redirect()->route('cadaver', $id);
    }

})->name('escena');

Route::auth();

