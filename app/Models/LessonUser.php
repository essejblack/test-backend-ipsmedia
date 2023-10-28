<?php

namespace App\Models;

use App\Events\LessonWatched;
use App\Models\Relations\LessonUserRelationsTrait;
use Illuminate\Database\Eloquent\Model;

class LessonUser extends Model
{
    use LessonUserRelationsTrait;
    public $timestamps = false;
    protected $table = 'lesson_user';
    protected $dispatchesEvents = [
        'created' => LessonWatched::class
    ];
    protected $fillable = [
        'user_id',
        'lesson_id',
        'watched',
    ];
}

