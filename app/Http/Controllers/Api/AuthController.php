<?php

namespace App\Http\Controllers\Api;

use App\Helpers\helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Models\User;
use App\Permissions\V1\Abilities;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    use ApiResponses;

    /**
     * Log in a user
     *
     * This endpoint allows a user to log in with their email and password.
     *
     * @group Authentication
     * @bodyParam email string required The user's email. Example: user@example.com
     * @bodyParam password string required The user's password. Example: secret
     * @response 200 {
     *   "token": "eyJ0eXAiOiJKV1QiLCJh...",
     *   "user": {
     *     "id": 1,
     *     "name": "John Doe"
     *   }
     * }
     */
    public function login(LoginUserRequest $request)
    {
        $request->validated($request->all());

        if(!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Invalid credentials', 401);
        }

        $user = User::firstWhere('email', $request->email);

        return $this->ok(
            'Authenticated',
            [
                'token' => $user->createToken(
                    'API token for ' . $user->email,
                    Abilities::getAbilities($user),
                    now()->addMonth())->plainTextToken,
                'user_reference' => $user->reference_id
            ]
        );
    }

    /**
     * Register
     * @group Authentication
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(10),
            'is_admin' => false
        ]);

        $user->reference_id = helpers::generate_reference_id(6, $user->name, $user->id);
        $user->save();

        return $this->ok('User registered successfully', [
            'user' => $user,
        ]);
    }

    /**
     * Logout
     * @group Authentication
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->ok('Logged out!');
    }
}
