<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculoDeseado extends Model
{
    use HasFactory;

    protected $table = 'vehiculos_deseados';
    public $timestamps = false; // Desactiva los timestamps

    protected $fillable = [
        'nombre',
        'codigo',
        'marca',
        'serie',
        'url_foto',
        'usuario_id',
        'eliminado',
    ];
}
