<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'categoria'];

    public function opciones()
    {
        return $this->hasMany(Opcion::class);
    }
}
