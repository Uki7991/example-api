<?php

namespace App\Responses;

use App\Models\User;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
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
