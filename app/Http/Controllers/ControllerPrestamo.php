<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Database\QueryException;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControllerPrestamo extends BaseController
{
    //Borrar un prestamo
    public function deletePrestamo(Request $request){

        $id = $request->input('id');
      
        return Prestamo::where('id', '=', $id)
        ->delete();
          
    }

    //Modificar un prestamo
    public function updatePrestamo(Request $request){

        $id = $request->input('id');
        $importe = $request->input('importe');
        $intereses = $request->input('intereses');
        $idUsuario = $request->input('idUsuario');

        return Prestamo::where('id', '=', $id)
        ->update(['importe' => $importe, 'intereses' => $intereses, 'idUsuario' => $idUsuario]);
    }
}