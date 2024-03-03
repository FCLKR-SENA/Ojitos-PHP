<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail; -> Veificacion de email para inciciar sesion.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'document',
        'name',
        'lastname',
        'age',
        'email',
        'password',
        'roles_idroles'
        //Se agregaron todas a excepcion de "name" y "password"
      ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'document_verified_at' => 'datetime', //Se cambio la palabra "email" por "document"
    ];

    //$User->adopcion COD1
    public function adopcion():HasMany{
        return $this->hasMany(Animal::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_idroles');
    }

    public function hasRole($rol)
    {
        return $this->role->name === $rol;
    }

    public function chooseRole($rol)
    {
        return $this->role->name === $rol;
    }

    public function hasAnyRole(...$roles)
    {
        return $this->role()->whereIn('name', $roles)->exists();
    }

    public function adoptions()
    {
        return $this->hasMany(Adoption::class, 'usuarios_id_usuario');
    }


}
