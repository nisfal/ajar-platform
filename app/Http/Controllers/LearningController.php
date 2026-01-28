<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\CourseChapter;
use Illuminate\Support\Facades\Auth;

class LearningController extends Controller
{
    public function index()
    {
        $courses = Auth::user()->enrolledCourses()->latest()->get();
        return view('learning.index', compact('courses'));
    }

    public function show(Course $course, CourseChapter $chapter)
    {
        // Simple check if user is enrolled
        if (!Auth::user()->enrolledCourses()->where('course_id', $course->id)->exists() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        $course->load('chapters');
        return view('learning.show', compact('course', 'chapter'));
    }
}
