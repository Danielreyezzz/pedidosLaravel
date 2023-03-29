<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administradores extends Authenticatable
{
    use HasFactory;
    protected $table = 'administradores';
    protected $primaryKey = 'id_administrador';
    public $timestamps = false;
    public function administradores_entradas(): HasMany
    {
        return $this->hasMany(Administradores_entradas::class, 'id_usuario', 'id_administrador');
    }

}
