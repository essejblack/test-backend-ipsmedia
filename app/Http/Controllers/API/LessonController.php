<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\Lesson;
use App\Models\LessonUser;
use App\Models\User;

class LessonController extends ApiController
{
    public function index()
    {
        Lesson::all();
    }

    public function seen(Lesson $lesson, User $user)
    {
        LessonUser::query()->createOrFirst([
            'user_id' => $user->id,
            'lesson_id' => $lesson->id,
        ], [
            'watched' => true,
        ]);

        return $this->response('Success');
    }
}
