<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index', [
            'students' => Student::with('department')->get(),
        ]);
    }

    public function create()
    {
        return view('students.create', [
            'departments' => Department::all(),
        ]);
    }

    public function validateStore(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'email' => 'required|email|unique:student,email',
            'phone' => 'nullable|string|max:15',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:' . implode(',', \App\Enums\Gender::values()),
            'address' => 'nullable|string|max:255',
            'enrollment_date' => 'required|date',
            'department_id' => 'required|exists:department,department_id',
            'current_semester' => 'required|in:' . implode(',', \App\Enums\CurrentSemester::values()),
            'status' => 'required|in:' . implode(',', \App\Enums\StudentStatus::values()),
            'photo_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        return back()->with([
            'validatedData' => $validated,
            'showModal' => true,
        ])->withInput();
    }

    public function store(Request $request)
    {
        $request['student_id'] =  Student::count() + 1;

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $departments = Department::all();

        return view('students.edit', compact('student', 'departments'));
    }
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->only([
            'student_name',
            'email',
            'phone',
            'date_of_birth',
            'gender',
            'address',
            'enrollment_date',
            'department_id',
            'current_semester',
            'status',
            'photo_url',
        ]));
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
