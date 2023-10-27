<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Resources\UserAchievementResource;
use App\Models\Lesson;
use App\Models\User;
use App\Traits\apiResponseTrait;

class CommentController extends ApiController
{
    use apiResponseTrait;
    public function store(Lesson $lesson)
    {

    }
}
