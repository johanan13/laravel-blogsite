<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUser
{
    public function handle(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);

        return $user;
    }
}
