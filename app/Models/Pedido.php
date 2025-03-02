<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'provincia',
        'localidad',
        'direccion',
        'coste',
        'estado',
        'fecha',
        'hora',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function lineasPedidos()
    {
        return $this->hasMany(LineaPedido::class);
    }
}