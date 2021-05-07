<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use Illuminate\Database\QueryException;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControllerBanco extends BaseController
{
    //Crear una cuenta bancaria
    public function newBanco (Request $request){
      
        $numCuenta = $request->input('numCuenta');
        $oficina = $request->input('oficina');
        $idUsuario = $request->input('idUsuario');

        try {
            return Banco::create([
                'numCuenta' => $numCuenta,
                'oficina' => $oficina,
                'idUsuario' => $idUsuario
            ]);
        } catch (QueryException $error) {
            return $error;
        }
          
    }
}
