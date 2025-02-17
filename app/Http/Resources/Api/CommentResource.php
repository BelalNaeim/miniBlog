<?php

namespace App\Http\Resources\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'comment'=>Str::limit(strip_tags($this->comment)),
            'post'=> $this->whenLoaded('post',$this->post),
            'user'=> $this->whenLoaded('user',$this->user),
        ];
    }
}
