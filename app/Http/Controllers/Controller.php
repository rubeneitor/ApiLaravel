<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    public function register (Request $request){
      
           $nombre = $request->input('nombre');
           $email = $request->input('email');
           $contraseña = $request->input('contraseña');

           $contraseña = Hash::make($contraseña);

           try {
               return usuarios::create(
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
}
