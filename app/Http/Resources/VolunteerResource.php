<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VolunteerResource extends JsonResource
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
            "title"=> $this->title,
            "description"=> $this->description,
            "image"=> $this->image,
            "activity_type"=> $this->activity_type,
            "location"=> $this->location,
            "age_group"=> $this->age_group,
            "contact_email"=> $this->contact_email,
            "contact_phone"=> $this->contact_phone,
            "status"=> $this->status,
            "start_date"=> $this->start_date,
            "end_date"=> $this->end_date,
        ];
    }
}
