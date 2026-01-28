<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Laravel for Beginners',
                'slug' => 'laravel-for-beginners',
                'description' => 'Learn the basics of Laravel 11 and build your first web application.',
                'price' => 250000,
                'instructor' => 'John Doe',
                'duration' => '5 Hours',
                'level' => 'Beginner',
                'is_featured' => true,
                'chapters' => [
                    ['title' => 'Introduction to Laravel', 'content' => 'Overview of the framework...', 'order' => 1],
                    ['title' => 'Routing and Controllers', 'content' => 'Managing requests...', 'order' => 2],
                    ['title' => 'Database and Migrations', 'content' => 'Setting up schema...', 'order' => 3],
                ]
            ],
            [
                'title' => 'Mastering Alpine.js',
                'slug' => 'mastering-alpine-js',
                'description' => 'Build reactive interfaces without leaving your HTML.',
                'price' => 150000,
                'instructor' => 'Jane Smith',
                'duration' => '3 Hours',
                'level' => 'Intermediate',
                'is_featured' => false,
                'chapters' => [
                    ['title' => 'Declarative Logic', 'content' => 'Basics of x-data...', 'order' => 1],
                    ['title' => 'DOM Manipulation', 'content' => 'Events and attributes...', 'order' => 2],
                ]
            ],
        ];

        foreach ($courses as $courseData) {
            $chapters = $courseData['chapters'];
            unset($courseData['chapters']);
            
            $course = \App\Models\Course::create($courseData);
            
            foreach ($chapters as $chapterData) {
                $course->chapters()->create($chapterData);
            }
        }
    }
}
