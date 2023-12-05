<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Rol;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all(); 
        $infor = [];
        foreach ($users as $user) {
            $infor[] = [
                'id_user' => $user->id_user,
                'usuario' => $user->usuario,
                'habilitado' => $user->habilitado,
                'fecha' => $user->fecha,
                'persona' => Persona::find($user->id_persona),
                'rol' => Rol::find($user->id_rol),
            ];
        }


        return $infor;
    }

    public function show($id){
        $user = User::find($id);
        return $user;
    }

    public function store(Request $request){

        $persona = new Persona();

        $persona->primernombre = $request->primernombre;
        $persona->primerapellido = $request->primerapellido;
        
        $persona->save();

        if (isset($persona->id_persona)) {
            $fechaHoy = Carbon::now();
            $habilidato = 1;
    
            $password = $request->password;
            $contraseñaEncriptada = Hash::make($password);
    
            $user = new User();
            $user->usuario = $request->usuario;
            $user->password = $contraseñaEncriptada;
            $user->id_rol = $request->id_rol;
            $user->id_persona = $persona->id_persona;
            $user->habilitado =  $habilidato;
            $user->fecha = $fechaHoy;
            
            $user->save();
        }
       

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
