<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
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
            'name'=> $this->name,
            'description'=> $this->description,
            'class'=> $this->class,
            'persons'=> $this->persons,
            'price'=> $this->price,
            'arrival_date'=> $this->arrival_date,
            'departure_day'=>$this->departure_day,
        ];
    }
}
