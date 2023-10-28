<?php

namespace App\Events;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class LessonWatched
{
    use Dispatchable, SerializesModels;

    public User $user;
    public Lesson $lesson;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(public $lessonUser)
    {
        $this->user = User::find($lessonUser->user_id);
        $this->lesson = Lesson::find($lessonUser->lesson_id);
    }
}
