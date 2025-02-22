<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => UserResource::make($this->whenLoaded('user')),
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => $this->created_at->format('Y/m/d')
        ];
    }
}
