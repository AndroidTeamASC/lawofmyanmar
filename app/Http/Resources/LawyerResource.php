<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LawyerResource extends JsonResource
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
            'lawyer_id' => $this->id,
            'name'      => $this->name,
            'position'  => $this->position,
            'lawyer_no'=> $this->lawyer_no,
            'address'   => $this->address,
            'phone'     => $this->phone
        ];
    }
}
