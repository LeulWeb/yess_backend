<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScholarshipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'funding_amount' => $this->funding_amount/100,
            'currency' => $this->currency,
            'eligibility' => $this->eligibility_criteria,
            'deadline' => $this->deadline,
            'application_process' => $this->application_process,
            'program_duration' => $this->program_duration,
            'funding_source' => $this->funding_source,
            'institution' => $this->institution,
            'program' => $this->program,
            'link' => $this->link,
            'cover' => $this->cover,
            'country' => $this->country,
        ];
    }
}
