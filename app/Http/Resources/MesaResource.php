<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MesaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'identificacao' => $this->uuid,
            'nome' => $this->identificacao,
            'descricao' => $this->descricao,
        ];
    }
}
