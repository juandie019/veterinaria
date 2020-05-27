<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $primaryKey = 'folio';

    public function ventas_detalladas()
    {
        return $this->hasMany(VentaDetallada::class, 'folio_venta', 'folio');
    }

}
