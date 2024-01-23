<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VolunteerApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'message'=>$this->message,
            'phoneNumber'=>$this->phoneNumber,
            'activity'=>[
                'title'=>$this->volunteer->title,
                'description'=>$this->volunteer->description,
                'target_community'=>$this->volunteer->target_community,
                'location'=>$this->volunteer->location,
                'activity_type'=>$this->volunteer->activity_type,
                'image'=>$this->volunteer->image,
                'age_group'=>$this->volunteer->age_group,
                'contact_phone'=>$this->volunteer->contact_phone,
                'contact_email'=>$this->volunteer->contact_email,
            ]
        ];
    }
}
