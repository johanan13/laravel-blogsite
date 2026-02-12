<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class LogoutUserController extends Controller
{
    /**
     * Log out the authenticated user.
     *
     * @group Authentication
     * @response 302 {
     *   "message": "User logged out successfully and redirected to home."
     * }
     * @response 401 {
     *   "message": "User is not authenticated."
     * }
     */
    public function __invoke()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logged out successfully.');
    }
}