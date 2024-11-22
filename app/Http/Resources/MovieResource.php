<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
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
            'is_published' => $this->is_published,
            'poster' => asset($this->poster),
            'genres' => GenreResource::collection($this->whenLoaded('genres')),
        ];
    }
}
