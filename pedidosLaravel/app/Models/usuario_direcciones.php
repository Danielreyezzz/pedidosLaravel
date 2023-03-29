<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_direccion extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
    public function pedidos()
   {
      return $this->hasMany(Pedido::class);
   }

}
