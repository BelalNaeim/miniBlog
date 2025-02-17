<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

     private $token = '';

     public function setToken($value)
     {
         $this->token = $value;
         return $this;
     }

    public function toArray(Request $request): array
    {
        return [
            'name'          => $this->name,
            'email'         => $this->email,
            'created_at'    => $this->created_at,
            'token'        => $this->token,

        ];
    }
}



