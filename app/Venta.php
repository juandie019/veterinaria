<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Venta extends Model
{
    protected $primaryKey = 'folio';

    public function ventas_detalladas()
    {
        return $this->hasMany(VentaDetallada::class, 'folio_venta', 'folio');
    }

    public function descuento()
    {
        return $this->hasOne(Descuento::class, 'folio_venta', 'folio');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado', 'id_empleado');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'numero_celular');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }

}
