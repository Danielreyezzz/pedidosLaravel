<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Usuarios_direcciones extends Model
{
    use HasFactory;
    public function usuarios(): BelongsTo
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario', 'id_usuario');
    }
}
