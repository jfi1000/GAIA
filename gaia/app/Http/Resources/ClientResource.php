<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'RFC' => $this->RFC,
            'email' => $this->email,
            'movil' => $this->movil,
            'created_at' => $this->created_at->format('d-m-Y'),
            // 'updated_at' => $this->updated_at,
            // 'deleted_at' => $this->deleted_at,
        ];
    }
}
