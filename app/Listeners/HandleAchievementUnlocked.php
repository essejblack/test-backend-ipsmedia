<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\BadgeUnlocked;
use App\Models\Badge;
use Illuminate\Support\Facades\Log;

class HandleAchievementUnlocked
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
    public function handle(AchievementUnlocked $event): void
    {
        $user = $event->user;
        $count = $user->achievements()->count();
        switch (true) {
            case ($count == 10):
            case($count == 4):
            case($count == 2):
                $badge = Badge::getNextBadge($user);
                $user->badge_id = $badge->id;
                $user->save();
                BadgeUnlocked::dispatchIf(($user->badge_id == $badge->id), $badge->name, $user);
                break;
        }
    }
}
