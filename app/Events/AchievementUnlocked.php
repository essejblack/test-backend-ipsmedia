<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class AchievementUnlocked
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public string $achievement_name, public User $user)
    {
        Log::info('is firing ...' . $achievement_name);
    }
}
