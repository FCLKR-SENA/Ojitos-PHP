<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{

    use HasFactory;
    protected $table = 'adopcion';
    protected $primaryKey = 'id_animaladopcion';
    protected $fillable = [
        'fecha_adopcion',
        'animal_adopcioncol',
        'usuarios_id_usuario',
        'img',
        'created_at',
        'updated_at',
        'probabilidad',
        'adoption_status',
        'motivo'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'usuarios_id_usuario');
    }

    public function animals()
    {
        return $this->belongsTo(Animal::class, 'animal_adopcioncol');
    }
}
