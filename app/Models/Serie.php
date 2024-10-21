<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $table = 'series';
    public $timestamps = false; // Desactiva los timestamps

    protected $fillable = [
        'nombre',
        'marca_id',
        'usuario_id',
        'eliminado',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'serie_id');
    }
}
