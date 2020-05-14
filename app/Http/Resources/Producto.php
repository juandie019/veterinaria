<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Producto extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id_producto' => $this->id_producto,
            'nombre' => $this->nombre,
            'precio' => $this->precio,
        ];
    }
}
