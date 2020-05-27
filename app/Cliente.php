<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'numero_celular';

    public function cupon()
    {
        return $this->hasOne(Cupon::class, 'cliente_id', 'numero_celular');
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($cliente){
    //        $cliente->cupon()->create([
    //            'cliente_id' => $cliente->numero_celular,
    //            'cupon' => true,
    //        ]);
    //     });

    // }
}
