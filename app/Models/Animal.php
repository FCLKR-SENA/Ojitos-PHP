<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Animal extends Model
{
    use HasFactory;
    protected $table = 'animales_en_adopcion';
    protected $fillable=[

        'fechaEncuentro',
        'especie_Animal',
        'nombreAnimaladopocion',
        'raza',
        'observacionesAnimal',
        'estadoSolicitud',
        'created_at'
        //'user_id', COD2
    ];

    public function  user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}

