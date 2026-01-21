<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()->create([
            'name' => 'Eanglish beach',
            'description' => 'dqwdsa',
            'hours' => 5,
            'img' => null,
            'start_date' => now(),
            'end_date' => now(),
            'price' => 100,
        ]);
    }
}
