<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedidos_estados extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function pedidos(): BelongsTo
    {
        return $this->belongsTo(Pedidos::class, 'id_pedido', 'id_pedido');
    }
}
