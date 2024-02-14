<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            'role' => $this->role,
            'interest' => $this->interest,
            'phone' => $this->phone,
            'skill' => $this->skill,
            'profile_picture' =>  $this->profile_picture,
            'bio' => $this->bio,
            'city' => $this->city,
            'country' => $this->country,
            'region' => $this->region,
            'story' => $this->story

        ];
    }
}
