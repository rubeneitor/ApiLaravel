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
    //Registrar usuario nuevo
    public function register (Request $request){
      
           $nombre = $request->input('nombre');
           $email = $request->input('email');
           $contraseña = $request->input('contraseña');
           $resSecreta = $request->input('resSecreta');
           $preSecreta = $request->input('preSecreta');

           $contraseña = Hash::make($contraseña);

           try {
               return Usuario::create(
                   [
                       'nombre' => $nombre,
                       'email' => $email,
                       'contraseña' => $contraseña,
                       'resSecreta' => $resSecreta,
                       'preSecreta' => $preSecreta
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

    //Login
    public function login(Request $request){
        
        $email = $request->input('email');
        $contraseña = $request->input('contraseña');

        try {
            $usuario_validado = Usuario::select('contraseña')
            ->where('email', 'LIKE', $email)
            ->first();

            if(!$usuario_validado){
                return response()->json([
                    'error' => "Email o contraseña incorrecta"
                ]);
            }

            $hashed = $usuario_validado->contraseña;

            //comprobacion de que la contraseña corresponde con el del email

            if(Hash::check($contraseña, $hashed)){

                //si existe, generamos token

                $length = 50;
                $token = bin2hex(random_bytes($length));

                Usuario::where('email', $email)
                ->update(['token' => $token]);

                return Usuario::where('email', 'LIKE', $email)
                ->get();
            } else {
                return response()->json([
                    //contraseña incorrecta
                    'error' => "Email o contraseña incorrecta"
                ]);
            }
        } catch (QueryException $error) {
            return response()->$error;
        }
    }

    public function logout(Request $request){
        //hacemos update en el campo token del usuario

        $id = $request->input('id');

        $token_empty = "";

        try {

            return Usuario::where('id', '=', $id)
            ->update(['token' => $token_empty]);

        } catch(QueryException $error){
            return $error;
        }
    }
}
