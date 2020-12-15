<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'folio_venta','folio');
    }
}
