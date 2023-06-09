<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelCommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'hotel_id'=> $this->hotel_id,
            'description'=> $this->description,
            'username' => $this->user->name,
            'user_id'=> $this->user->id,
        ];
    }
}
