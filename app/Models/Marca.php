<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'marcas';
    public $timestamps = false; // Desactiva los timestamps

    protected $fillable = [
        'nombre',
        'usuario_id',
        'eliminado',
    ];

    public function series()
    {
        return $this->hasMany(Serie::class, 'marca_id');
    }

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'marca_id');
    }
}
