<?php

namespace App\Http\Controllers;

use App\Models\Pagina;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function index(){
        return Pagina::all();
    }

    public function show($id){
        $pagina = Pagina::find($id);
        return $pagina;
    }

    public function store(Request $request){
        $pagina = new Pagina();
        $pagina->url = $request->url;
        $pagina->estado = $request->estado;
        $pagina->nombre = $request->nombre;
        $pagina->descripcion = $request->descripcion;
        $pagina->icono = $request->icono;
        $pagina->tipo = $request->tipo;
        $pagina->save();

        return $pagina;
    }

    public function update(Request $request, $id){
        $pagina = Pagina::find($id);
       
        if (isset($request->url)) {
            $pagina->url = $request->url;
        }
        
        if (isset($request->estado)) {
            $pagina->estado = $request->estado;
        }
        
        if (isset($request->nombre)) {
            $pagina->nombre = $request->nombre;
        }
        
        if (isset($request->descripcion)) {
            $pagina->descripcion = $request->descripcion;
        }
        
        if (isset($request->icono)) {
            $pagina->icono = $request->icono;
        }
        
        if (isset($request->tipo)) {
            $pagina->tipo = $request->tipo;
        }
        
        $pagina->save();

        return $pagina;
    }

    public function delete($id){
        $pagina = Pagina::find($id);
        $pagina->delete();
    }
}
