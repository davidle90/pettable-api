<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\helpers;
use App\Http\Filters\V1\PetFilter;
use App\Http\Requests\Api\V1\Pet\StorePetRequest;
use App\Http\Requests\Api\V1\Pet\UpdatePetRequest;
use App\Http\Resources\V1\PetResource;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PetController extends ApiController
{
    /**
     * Get all pets
     * @group Managing Pets
     * @queryParam sort string Data field(s) to sort by. Separate multiple fields with commas. Denote descending sort with minus sign. Example: sort=title,-createdAt
     * @queryParam filter[status] Filter by status code: A, C, H, X. No-example
     * @queryParam filter[title] Filter by title. Wildards are supported. Example: *fix*
     */
    public function index(PetFilter $filters)
    {
        return PetResource::collection(Pet::filter($filters)->paginate());
    }

    /**
     * Create pet
     *
     * @group Managing Pets
     */
    public function store(StorePetRequest $request)
    {
        if(Gate::authorize('store-pet')){
            $pet = Pet::create($request->mappedAttributes());
            $pet->reference_id = helpers::generate_reference_id(3, $pet->name, $pet->id);
            $pet->save();
            return new PetResource($pet);
        }
    }

    /**
     * Display pet
     *
     * @group Managing Pets
     */
    public function show($reference_id)
    {
        $pet = Pet::where('reference_id', $reference_id)->first();

        if(!$pet){
            return $this->error('Pet not found.', 404);
        }

        if($this->include('owner')) {
            $pet->load('owner');
        }

        return new PetResource($pet);
    }

    /**
     * Update pet
     *
     * @group Managing Pets
     */
    public function update(UpdatePetRequest $request, Pet $pet)
    {
        if(Gate::authorize('update-pet', $pet)) {

            $pet->update($request->mappedAttributes());

            return new PetResource($pet);
        }
    }

    /**
     * Delete pet
     *
     * @group Managing Pets
     */
    public function destroy(Pet $pet)
    {
        if(Gate::authorize('delete-pet', $pet)) {

            $pet->delete();

            return $this->ok('Pet successfully deleted.');
        }
    }
}
