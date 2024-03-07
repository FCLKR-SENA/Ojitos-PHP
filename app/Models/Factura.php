<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'factura';
    protected $primaryKey = 'idfactura';

    protected $fillable = [
        'fecha_factura',
        'valor_factura',
        'iva',
        'total_factura',
        'usuarios_id_usuario',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'usuarios_id_usuario');
    }

    public function facturaDetails()
    {
        return $this->hasMany(FacturaDetail::class, 'factura_idfactura');
    }
}