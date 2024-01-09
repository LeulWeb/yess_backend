<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'schedule' =>$this->schedule,
            'is_remote' => $this->is_remote == 0 ? false: true,
            'sector' =>$this->sector,
            'location' => $this->location,
            'experience' => $this->experience,
            'deadline' => $this->deadline,
            'responsibilities' => $this->responsibilities,
            'requirements' => $this->requirements,
            'note' => $this->note,
            'salary_compensation' => $this->salary_compensation,
            'opportunities' => $this->opportunities,
            'vacancies' => $this->vacancies,
            'contact_address' => $this->contact_address,
            'contact_phone' => $this->contact_phone,
            'contact_email' => $this->contact_email,
            'logo' => $this->logo,
        ];
    }
}
