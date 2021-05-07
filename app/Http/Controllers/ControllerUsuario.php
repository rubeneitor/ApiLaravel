<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControllerUsuario extends BaseController
{
    public function register (Request $request){
      
           $nombre = $request->input('nombre');
           $email = $request->input('email');
           $contraseña = $request->input('contraseña');

           $contraseña = Hash::make($contraseña);

           try {
               return Usuario::create(
                   [
                       'nombre' => $nombre,
                       'email' => $email,
                       'contraseña' => $contraseña
                   ]);
           } catch (QueryException $error) {
               $eCode = $error->errorInfo[1];

               if($eCode == '1062'){
                   return response()->json([
                       'error' => "Email ya resgistrado anteriormente"
                   ]);
               }
           }
    }

    //Primer paso de recuperacion de contraseña por email
    public function recoverPass1(Request $request){

        $email = $request->input('email');

        try {
            return Usuario::where('email', 'LIKE', $email)->pluck('preSecreta')->toArray();
        } catch (QueryException $error) {
            return $error;
        }

    }

    //Segundo paso de recuperacion de contraseña por email
    public function recoverPass2(Request $request){

        $email = $request->input('email');
        $resSecreta = $request->input('resSecreta');
        $contraseña = $request->input('contraseña');

        $contraseña = Hash::make($contraseña);

        try {
            return Usuario::where('email', '=', $email)
            ->where('resSecreta', '=', $resSecreta)
            ->update(['contraseña' => $contraseña]);
        } catch (QueryException $error) {
            return $error;
        }
    }
}
