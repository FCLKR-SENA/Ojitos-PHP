<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Animal extends Model
{
    use HasFactory;
    protected $table = 'animales_en_adopcion';
    protected $primaryKey = 'id';
    protected $fillable=[

        'fechaEncuentro',
        'especie_Animal',
        'nombreAnimaladopocion',
        'raza',
        'age',
        'observacionesAnimal',
        'estadoSolicitud',
        'img',
        'updated_at',
        'created_at'
        //'user_id', COD2
    ];

    public function adoptions()
    {
        return $this->hasMany(Adoption::class, 'animal_adopcioncol');
    }



    public function  user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function vacunas()
    {
        return $this->hasMany(Animal_vacuna::class, 'animal_id');
    }

    public function vacunasModal()
    {
        return $this->belongsToMany(Vacuna::class);
    }


    //**FUNCION PARA ENCONTRAR LOS REGISTROS DE LA TABLA VACUNAS Y ELIMINARLOS***
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($animal) {
            $animal->vacunas()->delete();
        });
    }

    //**FIN DE LA FUNCION (RECORDAR QUE PARA USAR LO ANTERIOR SE DEBEN RELACIONAR LAS TABLAS***

}

