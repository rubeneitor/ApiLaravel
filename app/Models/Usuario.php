<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
        'contraseña',
        'resSecreta',
        'preSecreta'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'resSecreta'
    ];

    //Metodos que relacionan las tablas (explicado en el modelo de relacion incluido en el repositorio)

    public function bancos(){
        return $this->hasMany('App\Models\Banco');
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
