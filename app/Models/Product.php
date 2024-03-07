<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id_product';

    protected $fillable = [
        'product_name',
        'product_price',
        'descripcion',
        'stock',
        'img',
    ];

    public function facturaDetails()
    {
        return $this->hasMany(FacturaDetail::class, 'product_id_product');
    }
}