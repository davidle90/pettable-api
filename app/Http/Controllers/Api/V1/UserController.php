<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\helpers;
use App\Http\Filters\V1\UserFilter;
use App\Models\User;
use App\Http\Requests\Api\V1\StoreUserRequest;
use App\Http\Requests\Api\V1\UpdateUserRequest;
use App\Http\Resources\V1\UserResource;
use Illuminate\Support\Facades\Gate;

class UserController extends ApiController
{
    /**
     * Get all users
     * @group Managing Users
     * @queryParam sort string Data field(s) to sort by. Separate multiple fields with commas. Denote descending sort with minus sign. Example: sort=title,-createdAt
     * @queryParam filter[status] Filter by status code: A, C, H, X. No-example
     * @queryParam filter[title] Filter by title. Wildards are supported. Example: *fix*
     */
    public function index(UserFilter $filters)
    {
        return UserResource::collection(User::filter($filters)->paginate());
    }

    /**
     * Create user
     *
     * @group Managing Users
     */
    public function store(StoreUserRequest $request)
    {
        if(Gate::authorize('store-user')){
            $user = User::create($request->mappedAttributes());
            $user->reference_id = helpers::generate_reference_id(3, $user->name, $user->id);
            $user->save();
            return new UserResource($user);
        }
    }

    /**
     * Display user
     *
     * @group Managing Users
     */
    public function show($reference_id)
    {
        $user = User::where('reference_id', $reference_id)->first();

        if(!$user){
            return $this->error('User not found.', 404);
        }

        // if($this->include('groups')) {
        //     $user->load('groups');
        // }

        return new UserResource($user);
    }

    /**
     * Update user
     *
     * @group Managing Users
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if(Gate::authorize('update-user', $user)) {

            $user->update($request->mappedAttributes());

            return new UserResource($user);
        }
    }

    /**
     * Delete user
     *
     * @group Managing Users
     */
    public function destroy(User $user)
    {
        if(Gate::authorize('delete-user', $user)) {

            $user->delete();

            return $this->ok('User successfully deleted.');
        }
    }
}
