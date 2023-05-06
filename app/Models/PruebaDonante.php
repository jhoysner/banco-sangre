<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaDonante extends Model
{
    use HasFactory;

    protected $table = 'pruebas_donantes';


    public function donante()
    {
        return $this->belongsTo(Donante::class, 'donante_id');
    }
    public function prueba()
    {
        return $this->belongsTo(Prueba::class, 'prueba_id');
    }


}
