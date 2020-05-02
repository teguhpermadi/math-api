<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TujuanResource extends JsonResource
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
            'kd3' => $this->kd3,
            'indikatorKd3' => $this->indikatorKd3,
            'kd4' => $this->kd4,
            'indikatorKd4' => $this->indikatorKd4,
            'user_id' => $this->user,
        ];
    }
}
