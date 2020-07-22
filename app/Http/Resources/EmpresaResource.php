<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'imagem' => $this->logo ? url("storage/{$this->logo}") : '',
            'uuid' => $this->uuid,
            'flag' => $this->url,
            'email' => $this->email,
            'date_created' => Carbon::parse($this->created_at)->format('d/m/Y'),
        ];
    }
}
