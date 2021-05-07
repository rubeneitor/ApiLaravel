<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Database\QueryException;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControllerPago extends BaseController
{
    //Obtener historial de un cliente
    public function historial ($param1){
      
        return Pago::join('usuarios', 'pagos.idUsuario', '=', 'usuarios.id')
        ->select('pagos.*')
        ->where('nombre', 'LIKE', $param1)->get();
          
    }
}