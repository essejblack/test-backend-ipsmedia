<?php

namespace App\Models\Relations;

use App\Models\Achievement;
use App\Models\Badge;
use App\Models\Comment;
use App\Models\Lesson;
use App\Models\LessonUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait BadgeRelationsTrait
{
    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}