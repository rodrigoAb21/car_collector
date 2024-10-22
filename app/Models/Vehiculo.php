<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';
    public $timestamps = false; // Desactiva los timestamps

    protected $fillable = [
        'nombre',
        'codigo',
        'marca_id',
        'serie_id',
        'usuario_id',
        'eliminado',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class, 'serie_id');
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'vehiculo_id');
    }
}
