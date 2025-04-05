<?php

namespace App\Http\Requests\Api\V1\Pet;

class UpdatePetRequest extends BasePetRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'data.attributes.name' => 'sometimes|string',
            'data.attributes.hunger' => 'sometimes|integer',
            'data.attributes.happiness' => 'sometimes|integer',
            'data.attributes.energy' => 'sometimes|integer',
            'data.attributes.isAlive' => 'sometimes|boolean',
            'data.attributes.user_id' => 'sometimes|integer',
            'data.attributes.referenceId' => 'prohibited'
        ];
    }
}
