<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banco extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numCuenta',
        'oficina',
        'idUsuario'
    ];

    //Metodos que relacionan las tablas (explicado en el modelo de relacion incluido en el repositorio)

    public function usuarioId(){
        return $this->belongsTo('App\Models\Usuario', 'idUsuario', 'id');
    }

    public function prestamos(){
        return $this->hasMany('App\Models\Prestamo');
    }

    public function pagos(){
        return $this->hasMany('App\Models\Pago');
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
