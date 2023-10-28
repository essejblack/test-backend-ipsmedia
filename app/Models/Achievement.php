<?php

namespace App\Models;

use App\Models\Relations\AchievementRelationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    use AchievementRelationsTrait;

    public static function unlockedAchievement(User $user)
    {
        return self::unlockedAchievements($user)->last();
    }

    public static function getNextAchievement(User $user)
    {
        return self::getNextAchievements($user)->first();
    }

    public static function unlockedAchievements(User $user)
    {
        return $user->achievements()->where('user_id', $user->id)->get();
    }

    public static function getNextAchievements(User $user)
    {
        $unlockedAchievement = ($unlocked = static::unlockedAchievement($user)) ? $unlocked : null;

        $query = static::query()->whereDoesntHave('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        });

        if ($unlockedAchievement){
            $query->where('id', '>', $unlockedAchievement->id);
        }

        return $query->get();
    }
}
