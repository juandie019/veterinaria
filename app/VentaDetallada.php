<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaDetallada extends Model
{

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'folio_venta','folio');
    }

    public function producto()
    {
        return $this->hasOne(Producto::class, 'id_producto', 'id_producto');
    }

    public function total(){//accesor
      return $this->precio * $this->cantidad;
    }

}
