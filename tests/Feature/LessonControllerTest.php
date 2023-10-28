<?php

namespace Tests\Feature;

use App\Models\Achievement;
use App\Models\Badge;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LessonControllerTest extends TestCase
{
    use DatabaseTransactions;
    public function testLessonWatchedWithAchievementAndBadge()
    {
        // Create a user, lesson, achievement, and badge
        $badges = Badge::factory()->count(5)->create();
        $achievements = Achievement::factory()->count(5)->create();
        $lessons = Lesson::factory()->count(30)->create();
        $lastLesson = Lesson::factory()->create();
        $user = User::factory()->create();

        foreach ($lessons as $lesson) {
            $response = $this->post("/api/lessons/{$lesson->id}/{$user->id}");
            $response->assertSeeText('Success');
        }
        $watchedLessonCount = $user->lessons()->wherePivot('watched', true)->count();
        $userAchievementsCount = $user->achievements()->count();
        $this->assertEquals(30, $watchedLessonCount);
        $this->assertEquals(3, $userAchievementsCount);
        $response = $this->post("/api/lessons/{$lastLesson->id}/{$user->id}");
        $response->assertSeeText('Success');
        $user = User::find($user->id);
        $this->assertEquals(2, $user->badge->id);
    }
}