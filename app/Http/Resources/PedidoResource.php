<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class PedidoResource extends JsonResource
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
            'identificacao' => $this->identificacao,
            'total' => $this->total,
            'status' => $this->status,
            'data' => Carbon::make($this->created_at)->format('Y-m-d'),
            'empresa' => new EmpresaResource($this->empresa),
            'cliente' => $this->cliente_id ? new ClienteResource($this->cliente) : '',
            'mesa' => $this->mesa_id ? new MesaResource($this->mesa) : '',
            'produtos' => ProdutoResource::collection($this->produtos),
            'comentario' =>$this->comentario,
            //'evaluatons' => EvaluationResource::collection($this->evaluations),
        ];
    }
}
