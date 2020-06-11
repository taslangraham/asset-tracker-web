<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Location extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'locations';

    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'location_id' => $this->location_id,
            'name' => $this->name
        ];
    }
}
