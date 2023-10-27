<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'user' => UserResource::make($this->whenLoaded('user')),
            'updated_at' => $this->updated_at,
        ];
    }
}
