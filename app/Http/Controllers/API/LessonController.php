<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function index()
    {
        Lesson::all();
    }
}
