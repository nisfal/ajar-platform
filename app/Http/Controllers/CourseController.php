<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(12);
        return view('courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $course->load('chapters');
        return view('courses.show', compact('course'));
    }
}
