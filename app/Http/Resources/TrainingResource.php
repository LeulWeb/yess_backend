<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingResource extends JsonResource
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
            // "is_popular"=> $this->is_popular,
            "title"=> $this->title,
            "image"=> $this->image,
            "description"=> $this->description,
            "youtube_links"=>$this->youtube_links,
            "playlist_link"=>$this->playlist_link,
            "trainer"=>new TrainerResource($this->whenLoaded('trainer')),
        ];
    }
}
