<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'Venta';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['Fecha', 'Cantidad', 'Total','Descuento', 'Usuario', 'Producto','Paquete'];

    public function productos() {
        return $this->belongsTo(Producto::class, 'Producto', 'id');
    }

    public function paquetes() {
        return $this->belongsTo(Paquete::class, 'Paquete', 'id');
    }

    public function usuarios() {
        return $this->belongsTo(User::class, 'Usuario', 'id');
    }
}
