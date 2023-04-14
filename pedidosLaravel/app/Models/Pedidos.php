<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Pedidos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pedido';
    public function usuarios(): BelongsTo
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario', 'id_usuario');
    }
    public function direcciones(): BelongsTo
    {
        return $this->belongsTo(Usuarios_direcciones::class, 'id_direccion');
    }
    public function administrador(): BelongsTo
    {
        return $this->belongsTo(Administradores::class, 'id_repartidor');
    }
    public function pedidos_estados(): HasMany
    {
        return $this->hasMany(Pedidos_estados::class, 'id_pedido', 'id_pedido');
    }
}
