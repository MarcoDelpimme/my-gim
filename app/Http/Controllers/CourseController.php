<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Booking;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        Course::create($request->all());
        return redirect()->route('courses.index');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->all());
        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index');
    }


    public function book(Request $request, Course $course)
    {

        $booking = new Booking();
        $booking->course_id = $course->id;
        $booking->user_id = auth()->id();
        $booking->status = 'pending';
        $booking->save();


        return redirect()->back();
    }
}
