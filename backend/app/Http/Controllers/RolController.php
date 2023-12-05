<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index(){
        return Rol::all();
    }

    public function show($id){
        $rol = Rol::find($id);
        return $rol;
    }

    public function store(Request $request){
        $rol = new Rol();
        $rol->rol = $request->rol;
        $rol->save();

        return $rol;
    }

    public function update(Request $request, $id){
        $rol = Rol::find($id);
        $rol->rol = $request->rol;
        $rol->save();

        return $rol;
    }

    public function delete($id){
        $rol = Rol::find($id);
        $rol->delete();
    }


}
