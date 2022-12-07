<?php

namespace App\Responses;

use App\Models\User;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        /**
         * @var User $user
         */
        $user = $request->user();
        return response()->json(['token' => $user->createToken('token')->plainTextToken]);
    }
}
