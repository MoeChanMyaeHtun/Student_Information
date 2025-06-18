<?php

namespace App\Http\Controllers;

use App\Enums\AttendanceStatus;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('attendance.index', [
            'attendances' => \App\Models\Attendance::with(['student', 'course'])->get(),
        ]);
    }

    public function create()
    {
        return view('attendance.create', [
            'students' => Student::all(),
            'courses' => Course::all(),
        ]);
    }

    public function validateStore(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:student,student_id',
            'course_id' => 'required|exists:course,course_id',
            'attendance_date' => 'required|date',
            'status' => 'required|in:' . implode(',', AttendanceStatus::values()),
        ]);

        return back()->with([
            'validatedData' => $validated,
            'showModal' => true,
        ])->withInput();
    }

    public function store(Request $request)
    {
        $request['attendance_id'] = \App\Models\Attendance::count() + 1;

        Attendance::create($request->all());

        return redirect()->route('attendance.index')->with('success', 'Attendance recorded successfully.');
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $students = Student::all();
        $courses = Course::all();
        return view('attendance.edit', compact('attendance', 'students', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->only([
            'student_id',
            'course_id',
            'attendance_date',
            'status',
        ]));
        return redirect()->route('attendance.index')->with('success', 'Attendance updated successfully.');
    }
}
