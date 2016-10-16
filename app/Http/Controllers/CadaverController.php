<?php

namespace App\Http\Controllers;

use App\Cadaver;
use App\User;
use App\Hueso;
use App\Estimulo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CadaverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getNextPersonaje($cadaver){
        $cadaver->load('personajes');
        $next = false;
        foreach($cadaver->personajes as $_personaje){
            if($next){
                return $_personaje;
            }
            if($_personaje->id == Auth::user()->id){
                $next = true;
            }
        }
        return $cadaver->personajes->first();
    }

    public function show($id)
    {
        $user = Auth::user();
        $cadaver = Cadaver::where('id',$id)->first();
        if(!$user->participa($cadaver)){
            return redirect()->route('cadaveres');
        }
        $turno = $user->id == $cadaver->turno;
        $ultimoHueso = $estimulo = false;
        $huesos = $cadaver->huesos()->orderBy('created_at', 'desc')->get();
        foreach($huesos as $hueso){
            if($hueso->user_id == $user->id){
                $ultimoHueso = $hueso;
                break;
            }
            $estimulo = $hueso->estimulo()->first();
        }
        return view('cadaver', [
            'ultimoHueso'   => $ultimoHueso,
            'estimulo'      => $estimulo,
            'cadaver'       => $cadaver,
            'toca'         => $turno
        ]);
    }

    public function create(Request $request){
        $user = Auth::user();

        $cadaver = new Cadaver();
        $cadaver->titulo = $request->titulo;
        $cadaver->llave = $request->llave;
        $cadaver->personajes = $request->personajes;
        $cadaver->turno = $user->id;
        if($user->cadaveres()->save($cadaver)){
            $cadaver->personajes = explode(",", $request->personajes);
            foreach($cadaver->personajes as $personaje){
                $_personaje = User::where('name',trim($personaje))->first();
                $cadaver->personajes()->save($_personaje);
            }
            $cadaver->personajes()->save($user);

            return redirect()->route('cadaver', $cadaver->id);
        }else{
            return redirect()->route('nuevo');
        }
    }

    public function createBone(Request $request){
        if(!empty($request->estimulo) && !(empty($request->texto))){
            $cadaver = Cadaver::where('id',$request->cadaver)->first();

            $hueso = new Hueso();
            $hueso->texto = $request->texto;
            $hueso->user_id = Auth::user()->id;
            $cadaver->huesos()->save($hueso);

            $estimulo = new Estimulo();
            $estimulo->texto = $request->estimulo;
            $hueso->estimulo()->save($estimulo);

            $cadaver->turno = $this->getNextPersonaje($cadaver)->id;
            $cadaver->save();
        }
        return redirect()->route('cadaver', $request->cadaver);
    }

    public function showList(){
        $cadaveres = Auth::user()->personajes()->get();
        return view('cadaveres', [
            'cadaveres' => $cadaveres
        ]);
    }

    public function escena($id,Request $request){
        $cadaver = Cadaver::where('id',$id)->first();
        if(!Auth::user()->participa($cadaver)){
            return redirect()->route('cadaveres');
        }
        $cadaver->load('huesos');
        if($request->llave == $cadaver->llave){
            return view('escena', [
                'cadaver' => $cadaver,
                'huesos' => $cadaver->huesos,
            ]);
        }else{
            return redirect()->route('cadaver', $id);
        }

    }

}