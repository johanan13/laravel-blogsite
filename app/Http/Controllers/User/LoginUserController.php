<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginUserRequest;

class LoginUserController extends Controller
{
    /**
     * Log in a user.
     *
     * @group Authentication
     * @bodyParam username_email string required The username or email of the user. Example: Joo
     * @bodyParam password string required The password of the user. Example: 12345678
     * @response 302 {
     *   "message": "Redirects to dashboard on successful login."
     * }
     * @response 422 {
     *   "message": "The given data was invalid.",
     *   "errors": {
     *       "username_email": ["The username_email field is required."],
     *       "password": ["The password field is required."]
     *   }
     * }
     * @response 401 {
     *   "message": "Invalid login credentials."
     * }
     */
    public function __invoke(LoginUserRequest $request)
    {
        $validatedData = $request->validated();

        if (auth()->attempt([
            'name' => $validatedData['username_email'],
            'password' => $validatedData['password'],
        ]) || auth()->attempt([
            'email' => $validatedData['username_email'],
            'password' => $validatedData['password'],
        ])) {
            $request->session()->regenerate();

            return redirect('/dashboard');
        }

        return back()->withErrors([
            'username_email' => 'Invalid login credentials.',
        ]);
    }
}