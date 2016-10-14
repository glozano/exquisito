<?php

namespace App\Http\Controllers;

use App\User;
use App\Cadaver;
use App\Http\Controllers\Controller;

class CadaverController extends Controller
{
    public function show($id)
    {
//        $ultimoHueso = Cadaver::find(1)->huesos()->where('user_id', 'foo')->first();
        $cadaver = Cadaver::where('id',$id)->first();
        if($ultimoHueso = $cadaver->huesos()->orderBy('created_at', 'desc')->first()){
            $estimulo = $ultimoHueso->estimulo()->first();
        }else{
            $estimulo = null;
        }
        return view('cadaver', [
            'ultimoHueso' => $ultimoHueso,
            'estimulo' => $estimulo,
            'cadaver' => $cadaver
        ]);
    }
}