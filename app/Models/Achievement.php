<?php

namespace App\Models;

use App\Models\Relations\AchievementRelationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    use AchievementRelationsTrait;
}
