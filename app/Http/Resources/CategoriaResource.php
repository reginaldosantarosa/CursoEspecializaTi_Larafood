<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaResource extends JsonResource
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
            //'identify' => $this->uuid,
            'nome' => $this->nome,
            'url' => $this->url,
            'descricao' => $this->descricao,
        ];

    }
}
