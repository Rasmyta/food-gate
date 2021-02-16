<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DishResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


        return [
            'id' => $this->id,
            'name' => $this->name,
            'direction' => $this->direction,
            'city' => $this->city,
            'email' => $this->email,
            'phone' => $this->phone,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'dishes' => DishResource::collection($this->getDishes),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
