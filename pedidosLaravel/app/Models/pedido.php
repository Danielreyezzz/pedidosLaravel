<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pedido_estado()
   {
      return $this->hasMany(Pedido_estado::class);
   }
   public function direccion()
    {
        return $this->belongsTo(User_direccion::class);
    }
}
