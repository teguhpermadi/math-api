<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IndikatorResource extends JsonResource
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
            'kode' => $this->kode,
            'deskripsi' => $this->deskripsi,
            'kompetensidasar_id' => new KompetensiDasarResource($this->kompetensidasar),
            'created_by' => new UserResource($this->user),
        ];
    }
}
