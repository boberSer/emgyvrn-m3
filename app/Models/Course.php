<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'hours',
        'img',
        'start_date',
        'end_date',
        'price',
    ];

    protected $hidden = [
        'lessons_id'
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }
}
