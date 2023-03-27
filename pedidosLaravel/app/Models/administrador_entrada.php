<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador_entrada extends Model
{
    use HasFactory;
    public function administrador()
    {
        return $this->BelongsTo(Administrador::class)->withTimestamps();
    }
}

