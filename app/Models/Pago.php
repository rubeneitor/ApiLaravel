<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipoPago',
        'bancoDestino',
        'importe',
        'estado',
        'idUsuario',
        'idBanco'
    ];

    //Metodos que relacionan las tablas (explicado en el modelo de relacion incluido en el repositorio)

    public function usuarioId(){
        return $this->belongsTo('App\Models\Usuario', 'idUsuario', 'id');
    }

    public function bancoId(){
        return $this->belongsTo('App\Models\Banco', 'idBanco', 'id');
    }

    /////////

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
