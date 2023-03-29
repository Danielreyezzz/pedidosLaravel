<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
   protected $table = 'administrador';
   public $timestamps = false;
    use HasFactory;
    public function administrador_entrada()
   {
      return $this->hasMany(Administrador_entrada::class)->withTimestamps();
   }
}
