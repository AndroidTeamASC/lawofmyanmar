<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Department;
use App\LawType;
use App\Region;
class LawResource extends JsonResource
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
            'law_id' => $this->id,
            'name'   => $this->name,
            'type'   => $this->type,
            'main'   => $this->main,
            'published_date' => $this->published_date,
            'release_date'   => $this->release_date,
              'law_no'         => $this->law_no,
            'department'     => new DepartmentResource(Department::find($this->department_id)),
            'law_type'    => new LawTypeResource(LawType::find($this->law_type_id)),
            'region'     => new RegionResource(Region::find($this->region_id))
          
        ];
    }
}

