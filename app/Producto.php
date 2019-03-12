<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'Producto';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['Nombre', 'Descripcion', 'Precio', 'Stock', 'Imagen', 'TipoMueble'];

    public function tipomuebles() {
        return $this->belongsTo(TipoMueble::class, 'TipoMueble', 'id');
    }

    public function paquetes() {
        return $this->hasMany(ProductoPaquete::class, 'Producto', 'id');
    }

    public function ventas() {
        return $this->hasMany(Venta::class, 'Producto' , 'id');
    }
}
