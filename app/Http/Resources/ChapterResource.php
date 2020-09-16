<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Law;
class ChapterResource extends JsonResource
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
            'chapter_id' => $this->id,
            'section'    => $this->section, 
            'name'      =>  $this->name,
            'law' => new LawResource(Law::find($this->law_id))
        ];
    }
}
