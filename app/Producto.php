<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey = 'id_producto';

    public function reducir_piso($cantidad)
    {
        if(intval($this->existencia_piso) < intval($cantidad))
         return false;

        $this->existencia_piso -= $cantidad;
        $this->save();
    }

    public function setNombreAttribute($value)//mutator
    {
        $this->attributes['nombre'] = strtoupper($value);
    }
}
