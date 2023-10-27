<?php

namespace App\Observers;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class LessonUserObserver
{
    public function sync(User $user, Lesson $lesson): void
    {
        Log::info("#123");
    }
}