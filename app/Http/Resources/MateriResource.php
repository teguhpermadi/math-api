<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MateriResource extends JsonResource
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
            'judul' => $this->judul,
            'apersepsi' => $this->apersepsi,
            'gambar' => $this->gambar,
            'tujuan' => $this->tujuan,
            'kd3' => $this->kd3,
            'indikatorKd3' => $this->indikatorKd3,
            'kd4' => $this->kd4,
            'indikatorKd4' => $this->indikatorKd4,
            'created_by' => new UserResource($this->user),

        ];
    }
}
