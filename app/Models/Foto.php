<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'fotos';
    public $timestamps = false; // Desactiva los timestamps

    protected $fillable = [
        'url_foto',
        'vehiculo_id',
        'usuario_id',
        'eliminado',
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }
}
