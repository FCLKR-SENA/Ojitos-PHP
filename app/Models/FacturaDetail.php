<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacturaDetail extends Model
{
    protected $table = 'factura_details';
    protected $primaryKey = ['factura_idfactura', 'product_id_product'];
    public $incrementing = false;

    protected $fillable = [
        'factura_idfactura',
        'product_id_product',
        'quantity',
        'iva',
        'products_totals',
        'descriptionF',
    ];

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'factura_idfactura');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id_product');
    }
}
