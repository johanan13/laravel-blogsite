<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterUserRequest;
use App\Services\User\RegisterUser;

class RegisterUserController extends Controller
{
    /**
     * Register a new user.
     *
     * @group Authentication
     * @bodyParam name string required The name of the user. Example: Joo
     * @bodyParam email string required The email of the user. Example: jo@gmail.com
     * @bodyParam password string required The password of the user. Example: 12345678
     * @bodyParam password_confirmation string required The confirmation of the password. Example: 12345678
     * @response 302 {
     *   "message": "User registered successfully and redirected to dashboard."
     * }
     * @response 422 {
     *   "message": "The given data was invalid.",
     *   "errors": {
     *       "name": ["The name field is required."],
     *       "email": ["The email field must be unique."],
     *       "password": ["The password must be at least 8 characters."]
     *   }
     * }
     */
    public function __invoke(RegisterUserRequest $request, RegisterUser $registerUser)
    {
        $registerUser->handle($request->validated());

        return redirect('/dashboard')->with('success', 'Registered successfully!');
    }
}