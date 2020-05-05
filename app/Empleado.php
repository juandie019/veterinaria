<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //
    public function puesto(){
        return $this->belongsTo(Puesto::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_empleado', 'id_empleado');
    }

    public function esGerente()
    {
        return $this->puesto->nombre == 'gerente';
    }

    public function esCajero()
    {
        return $this->puesto->nombre == 'cajero';
    }

    public function esAlmacenista()
    {
        return $this->puesto->nombre == 'cajero';
    }
}
