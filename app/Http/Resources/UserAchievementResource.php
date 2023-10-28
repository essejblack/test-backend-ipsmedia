<?php

namespace App\Http\Resources;

use App\Models\Achievement;
use App\Models\Badge;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAchievementResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'unlocked_achievements' => AchievementResource::make(Achievement::unlockedAchievement($this->resource)),
            'next_available_achievements' => AchievementResource::collection(Achievement::getNextAchievements($this->resource)),
            'current_badge' => $this->badge->name,
            'next_badge' => Badge::where('id', '>', $this->badge->id)
                ->orderBy('id')
                ->first()?->name,
            'remaing_to_unlock_next_badge' => Badge::where('id', '>', $this->badge->id)->orderBy('id')->count(),
        ];
    }
}
