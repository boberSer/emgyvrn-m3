<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'video_link',
        'hours',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_id');
    }
}
