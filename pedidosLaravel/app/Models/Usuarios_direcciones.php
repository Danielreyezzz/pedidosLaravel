<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuarios_direcciones extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_direccion';
    public function usuarios(): BelongsTo
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario', 'id_usuario');
    }
    public function pedidos(): HasMany
    {
        return $this->hasMany(Pedidos::class, 'id_direccion');
    }
}
