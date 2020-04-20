<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KompetensiIntiResource extends JsonResource
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
            'id' => $this->id,
            'deskripsi' => $this->deskripsi,
            'user' => new UserResource($this->user),
        ];
    }
}
