<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Lesson;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginate = 5;
        $courses = Course::with('lessons')
        ->paginate($paginate);
//        $courses = Course::all();

        return view('courses', compact('courses', 'paginate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lessons = Lesson::all();
        return view('courses', compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $img = $request->file('img')->store('images', 'public');
        $course = Course::create([
           ...$request->validated(),
            'img' => $img,
        ]);
//        dd($course);
        return view('courses', compact('course'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load('course_lessons');
        return view('courses', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        Course::all()->find($course)->delete();
        return view('courses');
    }
}
