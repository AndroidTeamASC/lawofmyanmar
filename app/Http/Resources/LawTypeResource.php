<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LawTypeResource extends JsonResource
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
            'lawtype_id' => $this->id,
            'name'       => $this->name
        ];
    }
}
