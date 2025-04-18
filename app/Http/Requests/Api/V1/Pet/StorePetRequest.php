<?php

namespace App\Http\Requests\Api\V1\Pet;

class StorePetRequest extends BasePetRequest
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
            'data.attributes.name' => 'required|string',
            'data.attributes.user_id' => 'sometimes|integer',
            'data.attributes.reference_id' => 'prohibited'
        ];
    }
}
