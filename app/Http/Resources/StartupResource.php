<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StartupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'website'=>$this->website,
            'logo'=>$this->logo,
            'product_service'=>$this->product_service,
            'contact_email'=>$this->contact_email,
            'contact_phone'=>$this->contact_phone,
            'employees'=>$this->employees,
            'founder'=>$this->founder,
            'image'=>$this->image,
            'location'=>$this->location,
            'sector'=>$this->sector,
            'facebook'=>$this->facebook,
            'telegram'=>$this->telegram,
            'linkedin'=>$this->linkedin,

        ];
    }
}
