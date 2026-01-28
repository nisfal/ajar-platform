<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCourses = Course::where('is_featured', true)->take(3)->get();
        return view('home', compact('featuredCourses'));
    }
}
