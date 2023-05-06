<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serologico extends Model
{
    use HasFactory;

    protected $table = 'serologicos';


    public function donante()
    {
        return $this->belongsTo(Donante::class, 'donante_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'responsable');
    }

}
