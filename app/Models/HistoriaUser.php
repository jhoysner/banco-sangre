<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaUser extends Model
{
    use HasFactory;

    protected $table = 'historia_user';


    public function donante()
    {
        return $this->belongsTo(Donante::class, 'donante_id');
    }
    public function pregunta()
    {
        return $this->belongsTo(Historia::class, 'pregunta_id');
    }


}
