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
            "id"=> $this->id,
            "name"=> $this->name,
            "email"=> $this->email,
            'username'=> $this->username,
            'role'=> $this->role,
            'interest'=> $this->interest,
            'phone'=> $this->phone,
            'skill'=> $this->skill,
            'profile_picture'=> 'http://192.168.100.40:8000/'.$this->profile_picture,
            'bio'=> $this->bio,
            'locations'=> $this->locations,
            'story'=>$this->story

        ];
    }
}
