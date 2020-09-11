<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Chapter;
class DetailResource extends JsonResource
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
            'detail_id' => $this->id,
            'name'      => $this->name,
            'chapter_id'=> new ChapterResource(Chapter::find($this->chapter_id))
        ];
    }
}
