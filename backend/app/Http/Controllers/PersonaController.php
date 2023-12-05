<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index(){
        return Persona::all();
    }

    public function show($id){
        $persona = Persona::find($id);
        return $persona;
    }

    public function store(Request $request){
        $persona = new Persona();
        $persona->primernombre = $request->primernombre;
        $persona->segundonombre = $request->segundonombre;
        $persona->primerapellido = $request->primerapellido;
        $persona->segundoapellido = $request->segundoapellido;
        $persona->save();

        return $persona;
    }

    public function update(Request $request, $id){
        $persona = Persona::find($id);
        $persona->primernombre = $request->primernombre;
        $persona->segundonombre = $request->segundonombre;
        $persona->primerapellido = $request->primerapellido;
        $persona->segundoapellido = $request->segundoapellido;
        $persona->save();

        return $persona;
    }

    public function delete($id){
        $persona = Persona::find($id);
        $persona->delete();
    }

}
