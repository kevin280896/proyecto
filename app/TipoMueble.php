<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMueble extends Model
{
    protected $table = 'tipomueble';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['Nombre'];

    /**
     * Funciones que hacen referencia a las relaciones 1:N, 1:1 o N:M dependiendo el caso en la base de datos
     * La estructura es (Modelo al que se hace referencia, llave foranea, llave primaria)
     * belongsTo = Hace referencia a (la llave foranea esta en esta tabla)
     * hasMany = Tiene muchas (la lleve primaria de este modelo se esta usando como foranea en otro modelo)
     */
    public function productos() {
        return $this->hasMany(Producto::class, 'TipoMueble', 'id');
    }
}
