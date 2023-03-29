<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Administradores_entradas extends Model
{
    use HasFactory;
    public function administradores(): BelongsTo
    {
        return $this->belongsTo(Administradores::class, 'id_usuario', 'id_administrador');
    }

}
