<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Crypt;
class UserCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'encrypted_id' =>  Crypt::encryptString($this->id),
            'first_name' => $this->first_name,
            'profile_pic' => $this->profile_pic,
            'address'=>$this->address,
            'Access_info'=>$this->Access_info,
            'speciality'=>$this->speciality,
            'time_slots' => TimeSlotCollection::collection($this->whenLoaded('timeSlots')),
        ];;
    }
}
