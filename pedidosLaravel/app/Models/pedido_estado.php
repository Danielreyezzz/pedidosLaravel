<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_estado extends Model
{
    use HasFactory;
    public function pedido()
    {
        return $this->BelongsTo(Pedido::class)->withTimestamps();
    }
}
