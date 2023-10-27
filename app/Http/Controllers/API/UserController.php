<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Resources\UserAchievementResource;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends ApiController
{
    public function index()
    {
        return $this->response(UserResource::collection(User::all()));
    }

    public function achievements(User $user)
    {
        return $this->response(UserAchievementResource::make($user));
    }
}
