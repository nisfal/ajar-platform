<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseChapter;
use App\Models\Order;
use App\Models\User;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'thumbnail',
        'instructor',
        'duration',
        'level',
        'is_featured',
    ];

    public function chapters()
    {
        return $this->hasMany(CourseChapter::class, 'course_id')->orderBy('order');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_courses')->withPivot('enrolled_at')->withTimestamps();
    }
}
