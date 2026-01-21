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
        'lessons_id'
    ];

    protected $hidden = [
        'lessons_id'
    ];
}
