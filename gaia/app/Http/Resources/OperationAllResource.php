<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ClientQueryResource;

class OperationAllResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'weight' => $this->weight,
            'date_operation' => $this->date_operation,
            'id_client' => $this->id_client,
            'id_residuo' => $this->id_residuo,
            'created_at' => $this->created_at->format('d-m-Y'),
            'client' => new ClientQueryResource($this->client),
            'residuo_tipo' => $this->residuo_tipo,
        ];

    }
}
