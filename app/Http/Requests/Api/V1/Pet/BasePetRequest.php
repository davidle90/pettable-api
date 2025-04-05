<?php

namespace App\Http\Requests\Api\V1\Pet;

use Illuminate\Foundation\Http\FormRequest;

class BasePetRequest extends FormRequest
{

    public function mappedAttributes(array $otherAttributes = []) {

        $attributeMap = array_merge([
            'data.attributes.name' => 'name',
            'data.attributes.hunger' => 'hunger',
            'data.attributes.happiness' => 'happiness',
            'data.attributes.energy' => 'energy',
            'data.attributes.isAlive' => 'is_alive',
            'data.attributes.lastUpdated' => 'last_updated',
        ], $otherAttributes);

        $attributesToUpdate = [];

        foreach($attributeMap as $key => $attribute){
            if($this->has($key)) {
                $value = $this->input($key);

                if($attribute === 'password'){
                    $value = bcrypt($value);
                }

                $attributesToUpdate[$attribute] = $value;
            }
        }

        return $attributesToUpdate;
    }
}
