<?php

namespace App\Models;

use App\Models\Relations\BadgeRelationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;
    use BadgeRelationsTrait;

    public static function getNextBadge(User $user)
    {
        return self::getNextBadges($user)->first();
    }

    public static function getNextBadges(User $user)
    {
        $badge = $user->badge;
        return  static::query()->where('id', '>', $badge->id)->get();
    }
}
