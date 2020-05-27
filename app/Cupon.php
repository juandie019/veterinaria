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

    public function acumularMonto($monto)
    {
        $this->monto_acumulado += $monto;

        if($this->monto_acumulado >= "1000" && $this->cupon != "cup")
          $this->disponible = true;
          $this->cupon = "cup";
          $this->monto_acumulado -= 1000;
          $this->save();
    }

    public function actualizarCupon()
    {
        if($this->monto_acumulado <= "1000"){
          $this->disponible = false;
          $this->cupon = null;
          $this->save();
        }
    }
}
