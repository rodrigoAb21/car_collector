<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    public $timestamps = false; // Desactiva los timestamps

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'eliminado',
    ];

    protected $hidden = [
        'password'
    ];

    public function marcas()
    {
        return $this->hasMany(Marca::class, 'usuario_id');
    }

    public function series()
    {
        return $this->hasMany(Serie::class, 'usuario_id');
    }

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'usuario_id');
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'usuario_id');
    }

    public function vehiculosDeseados()
    {
        return $this->hasMany(VehiculoDeseado::class, 'usuario_id');
    }
}
