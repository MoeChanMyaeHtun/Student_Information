<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index', [
            'courses' => Course::with(['department', 'teacher'])->get(),

        ]);
    }

    public function create()
    {
        return view('courses.create', [
            'departments' => Department::all(),
            'teachers' => Teacher::all(),
        ]);
    }

    public function validateStore(Request $request)
    {
        $validated = $request->validate([
            'course_name' => 'required|string|max:255',
            'department_id' => 'required|exists:department,department_id',
            'credits' => 'required|integer|min:1',
            'semester' => 'required|in:' . implode(',', \App\Enums\CurrentSemester::values()),
            'teacher_id' => 'required|exists:teacher,teacher_id',
        ]);

        return back()->with([
            'validatedData' => $validated,
            'showModal' => true,
        ])->withInput();
    }

    public function store(Request $request)
    {
        $request['course_id'] =  Course::count() + 1;
        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $departments = Department::all();
        $teachers = Teacher::all();
        return view('courses.edit', compact('course', 'departments', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->only([
            'course_name',
            'department_id',
            'credits',
            'semester',
            'teacher_id'
        ]));
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }
}
