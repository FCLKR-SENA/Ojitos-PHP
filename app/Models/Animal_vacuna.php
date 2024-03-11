<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal_vacuna extends Model
{
    use HasFactory;
    protected $table = 'animal_vacuna';
    protected $primaryKey = 'id';
    protected $fillable = [
        'animal_id',
        'vacuna_id',
        'adquisicion',
        'created_at',
        'updated_at'
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'id');
    }

    public function vacunas()
    {
        return $this->belongsTo(Vacuna::class, 'id');
    }
}
