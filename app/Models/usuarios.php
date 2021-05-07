<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
        'contraseña',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function bancos(){
        return $this->hasMany('App\Models\Banco');
    }

    public function prestamos(){
        return $this->hasMany('App\Models\Prestamo');
    }

    public function pagos(){
        return $this->hasMany('App\Models\Pago');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
