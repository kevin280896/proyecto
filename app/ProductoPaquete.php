<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoPaquete extends Model
{
    protected $table = 'producto_paquete';

    public $timestamps = false;

    protected $fillable = ['Producto', 'Paquete'];

    public function productos() {
        return $this->belongsTo(Producto::class, 'Producto', 'id');
    }

    public function paquetes() {
        return $this->belongsTo(Paquete::class, 'Paquete', 'id');
    }
}
