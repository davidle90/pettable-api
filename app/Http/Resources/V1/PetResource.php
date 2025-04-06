<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'pet',
            'id' => $this->id,
            'attributes' => [
                'referenceId' => $this->reference_id,
                'name' => $this->name,
                'hunger' => $this->hunger,
                'happiness' => $this->happiness,
                'energy' => $this->energy,
                'isAlive' => $this->is_alive,
                'lastUpdated' => $this->last_updated,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at
            ],
            'includes' => [
                'user' => UserResource::collection($this->whenLoaded('owner')),
            ],
            'links' => [
                'self' => route('pets.show', ['pet' => $this->reference_id])
            ]
        ];
    }
}
