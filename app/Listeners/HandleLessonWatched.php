<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\LessonWatched;
use App\Models\Achievement;

class HandleLessonWatched
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LessonWatched $event): void
    {
        $user = $event->user;
        $count = $user->lessons()->wherePivot('watched', true)->count();
        $achievement = Achievement::getNextAchievement($user);
        switch (true) {
            case ($count == 15):
            case($count == 10):
            case($count == 5):
                $user->achievements()->attach($achievement->id);
                AchievementUnlocked::dispatch(Achievement::unlockedAchievement($user)->name, $user);
                break;
        }
    }
}
