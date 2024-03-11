<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    use HasFactory;
    protected $table = 'vacunas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'descripcion',
        'created_at',
        'updated_at'
    ];
    public function animal_vacuna()
    {
        return $this->hasMany(Animal_vacuna::class, 'vacuna_id');
    }
}
