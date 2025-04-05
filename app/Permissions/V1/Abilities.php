<?php

namespace App\Permissions\V1;

use App\Models\User;

final class Abilities {

    // USER
    public const CreateUser = 'user:create';
    public const UpdateUser = 'user:update';
    public const DeleteUser = 'user:delete';
    public const UpdateOwnUser = 'user:own:update';
    public const DeleteOwnUser = 'user:own:delete';

    // PET
    public const CreatePet = 'pet:create';
    public const UpdatePet = 'pet:update';
    public const DeletePet = 'pet:delete';
    public const UpdateOwnPet = 'pet:own:update';
    public const DeleteOwnPet = 'pet:own:delete';

    public static function getAbilities(User $user) {

        if($user->is_admin) {
            return [
                self::CreateUser,
                self::UpdateUser,
                self::DeleteUser,
                self::CreatePet,
                self::UpdatePet,
                self::DeletePet,
            ];
        } else {
            return [
                self::UpdateOwnUser,
                self::DeleteOwnUser,
                self::UpdateOwnPet,
                self::DeleteOwnPet,
            ];
        }
    }
}
