<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController
{
    /**
     * @param UserUpdateRequest $request
     * @param UserService $userService
     * @return JsonResponse
     */
    public function update(UserUpdateRequest $request, UserService $userService): JsonResponse
    {
        return $userService->update($request);
    }
}
