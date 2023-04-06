<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
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
            'name'=> $this->name,
            'city'=> $this->city,
            'address'=> $this->address,
            'description'=> $this->description,
            'stars'=> $this->stars,
            'average_cost'=> $this->average_cost,
            'images'=> $this->imageUrl,
            'main_image'=>$this->main_image_url,
        ];
    }
}
