<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return User::all();
    }

    public function show($id){
        $user = User::find($id);
        return $user;
    }

    public function store(Request $request){
        $fechaHoy = Carbon::now();
        $habilidato = 1;

        $password = $request->password;
        $contraseñaEncriptada = Hash::make($password);

        $user = new User();
        $user->usuario = $request->usuario;
        $user->password = $contraseñaEncriptada;
        $user->id_rol = $request->id_rol;
        $user->id_persona = $request->id_persona;
        $user->habilitado =  $habilidato;
        $user->fecha = $fechaHoy;
        
        $user->save();

        return $user;
    }

    public function update(Request $request, $id){
        $user = User::find($id);

        if (isset($request->password)) {
            $password = $request->password;
            $contraseñaEncriptada = Hash::make($password);
            $user->password = $contraseñaEncriptada;
        }
        
        if (isset($request->usuario)) {
            $user->usuario = $request->usuario;
        }
        
        if (isset($request->id_rol)) {
            $user->id_rol = $request->id_rol;
        }
        
        if (isset($request->habilitado)) {
            $user->habilitado = $request->habilitado;
        }
        
        $user->save();

        return $user;
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
    }

}
