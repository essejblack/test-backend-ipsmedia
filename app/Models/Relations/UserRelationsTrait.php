<?php

namespace App\Models\Relations;

use App\Models\Achievement;
use App\Models\Badge;
use App\Models\Comment;
use App\Models\Lesson;
use App\Models\LessonUser;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait UserRelationsTrait
{
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class)->using(LessonUser::class)->withPivot('watched');
    }

    public function watched(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class)->wherePivot('watched', true);
    }

    public function achievements()
    {
        return $this->belongsToMany(Achievement::class);
    }

    public function badge()
    {
        return $this->belongsTo(Badge::class);
    }
}