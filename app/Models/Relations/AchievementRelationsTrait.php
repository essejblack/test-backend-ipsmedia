<?php

namespace App\Models\Relations;

use App\Models\User;

trait AchievementRelationsTrait
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}