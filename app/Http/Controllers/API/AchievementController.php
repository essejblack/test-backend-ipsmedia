<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\AchievementResource;
use App\Http\Resources\UserAchievementResource;
use App\Models\Achievement;
use App\Models\User;
use App\Traits\apiResponseTrait;

class AchievementController extends ApiController
{
    use apiResponseTrait;
    public function index()
    {
        return $this->response(AchievementResource::collection(Achievement::all()));
    }
}
