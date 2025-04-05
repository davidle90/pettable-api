<?php

namespace App\Policies\V1;

use App\Models\Pet;
use App\Models\User;
use App\Permissions\V1\Abilities;

class PetPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, Pet $model) {
        return $user->tokenCan(Abilities::DeletePet);
    }

    public function store(User $user) {
        return $user->tokenCan(Abilities::CreatePet);
    }

    public function update(User $user, Pet $model) {
        return $user->tokenCan(Abilities::UpdatePet);
    }
}
