<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'education_level'=> $this->education_level,
            'field_of_study' => $this->field_of_study,
            'award' => $this->award,
            'achievement' => $this->achievement,
        ];
    }
}
