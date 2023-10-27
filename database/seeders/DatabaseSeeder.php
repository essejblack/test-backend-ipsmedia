<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Comment;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $lessons = Lesson::factory()
            ->count(20)->create();

        $users = User::factory()
            ->count(3)->create()->modelKeys();

        $achievements = Achievement::factory()
            ->count(5)->create();

        collect($achievements)->random()->users()->attach(Arr::random($users));

        $comments = Comment::factory()->count(2)->create([
            'user_id' => Arr::random($users)
        ]);
    }
}
