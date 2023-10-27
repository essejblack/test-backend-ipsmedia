<?php

namespace App\Http\Resources;

use App\Models\Achievement;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAchievementResource extends JsonResource
{
    public function toArray($request): array
    {
        $achievement = $this->achievements()->where('user_id', $this->id)->last();

        return [
            'unlocked_achievements' => AchievementResource::collection($achievement),
            'next_available_achievements' => AchievementResource::collection(Achievement::query()->whereDoesntHave('users', function ($query) {
                $query->where('user_id', $this->id);
            })->get()),
            'current_badge' => '',
            'next_badge' => '',
            'remaing_to_unlock_next_badge' => 0,
        ];
    }
}
