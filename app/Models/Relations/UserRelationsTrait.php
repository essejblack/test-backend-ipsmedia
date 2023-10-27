<?php

namespace App\Models\Relations;

use App\Models\Comment;
use App\Models\Lesson;
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
        return $this->belongsToMany(Lesson::class);
    }

    public function watched(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class)->wherePivot('watched', true);
    }
}