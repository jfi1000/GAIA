<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ClientResource;

class OperationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'weight' => $this->weight,
            'date_operation' => $this->date_operation,
            'id_status' => $this->id_status,
            'id_client' => $this->id_client,
            'id_residuo' => $this->id_residuo,
            'qr' => $this->qr,
            // 'cliente_name2' => ClientResource::collection($this->client),
            'created_at' => $this->created_at->format('d-m-Y'),
        ];

    }
}
