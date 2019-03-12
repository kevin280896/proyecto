<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = 'Paquete';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['Nombre', 'Descripcion', 'Precio'];

    public function productos() {
        return $this->hasMany(ProductoPaquete::class, 'Paquete', 'id');
    }
}
