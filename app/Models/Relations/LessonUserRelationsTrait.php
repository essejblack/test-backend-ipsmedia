<?php

namespace App\Models\Relations;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait LessonUserRelationsTrait
{
    public function lesson(): BelongsTo
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsToMany(User::class);
    }
}