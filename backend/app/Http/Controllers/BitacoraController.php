<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function index(){
        return Bitacora::all();
    }

    public function show($id){
        $bitacora = Bitacora::find($id);
        return $bitacora;
    }

    public function store(Request $request){
        $bitacora = new Bitacora();
        $bitacora->id_user = $request->id_user;
        $bitacora->bitacora = $request->bitacora;
        $bitacora->fecha= $request->fecha;
        $bitacora->hora = $request->hora;
        $bitacora->ip = $request->ip;
        $bitacora->navegador = $request->navegador;
        $bitacora->save();

        return $bitacora;
    }

    public function update(Request $request, $id){
        $bitacora = Bitacora::find($id);
       
        if (isset($request->id_user)) {
            $bitacora->id_user = $request->id_user;
        }
        
        if (isset($request->bitacora)) {
            $bitacora->bitacora = $request->bitacora;
        }
        
        if (isset($request->fecha)) {
            $bitacora->fecha = $request->fecha;
        }
        
        if (isset($request->hora)) {
            $bitacora->hora = $request->hora;
        }
        
        if (isset($request->ip)) {
            $bitacora->ip = $request->ip;
        }
        
        if (isset($request->navegador)) {
            $bitacora->navegador = $request->navegador;
        }
        
        $bitacora->save();

        return $bitacora;
    }

    public function delete($id){
        $bitacora = Bitacora::find($id);
        $bitacora->delete();
    }
}
