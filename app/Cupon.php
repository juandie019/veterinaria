<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $fillable =[
     'id_cliente',
    ];

    public function cliente()
    {
       return $this->belongsTo(Cliente::class, 'numero_celular', 'cliente_id');
    }

    public function getDisponibleAttribute($value)//accesor
    {
        if ($this->monto_acumulado >= 1000)
           return $value = true;

        return $value = false;
    }

    public function acumularMonto($monto)
    {
        $this->monto_acumulado += $monto;
         $this->save();
    }

    public function obtenerCupones()
    {
        return intval($this->monto_acumulado / 1000);
    }
    public function usar($cantidad_cupones)
    {
        if($cantidad_cupones <= $this->obtenerCupones()){
          $this->monto_acumulado -= (1000 * $cantidad_cupones);
          $this->save();
        }
    }
}
