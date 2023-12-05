<?php

namespace App\Http\Controllers;

use App\Models\Enlace;
use Illuminate\Http\Request;

class EnlaceController extends Controller
{
    public function index(){
        return Enlace::all();
    }

    public function show($id){
        $enlace = Enlace::find($id);
        return $enlace;
    }

    public function store(Request $request){
        $enlace = new Enlace();
        $enlace->descripcion = $request->descripcion;
        $enlace->id_pagina = $request->id_pagina;
        $enlace->id_rol = $request->id_rol;
    
        $enlace->save();

        return $enlace;
    }

    public function update(Request $request, $id){
        $enlace = Enlace::find($id);
       
        if (isset($request->id_pagina)) {
            $enlace->id_pagina = $request->id_pagina;
        }
        
        if (isset($request->id_rol)) {
            $enlace->id_rol = $request->id_rol;
        }
        
        if (isset($request->descripcion)) {
            $enlace->descripcion = $request->descripcion;
        }
        
        $enlace->save();

        return $enlace;
    }

    public function delete($id){
        $enlace = Enlace::find($id);
        $enlace->delete();
    }
}
