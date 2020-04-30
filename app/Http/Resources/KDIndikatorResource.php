<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KDIndikatorResource extends JsonResource
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
            'jenis' => $this->jenis,
            'kode' => $this->kode,
            'deskripsi' => $this->deskripsi,
            'indikator' => $this->indikator,
            'created_by' => new UserResource($this->user),
        ];
    }
}
