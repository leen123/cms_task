<?php

namespace App\Http\Services;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserAuthService
{
    public static function login(array $attributes): JsonResponse|UserResource
    {
      
        try {
            $user = User::where('email', '=', $attributes['email'])->firstOrFail();
            throw_if(!Hash::check($attributes['password'], $user->password), new \Exception('Wrong password'));
            return UserResource::make($user);
        } catch (\Throwable $e) {
            return \response()->json(['general' => $e->getMessage()], 403);
        }
    }
}