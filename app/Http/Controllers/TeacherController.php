<?php

namespace App\Http\Controllers;

use App\Enums\Gender;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teachers.index', [
            'teachers' => Teacher::all(),
        ]);
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function validateStore(Request $request)
    {
        $validated = $request->validate([
            'teacher_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:teacher,email',
            'phone' => 'required|string|max:15',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:' . implode(',', Gender::values()),
            'address' => 'nullable|string|max:255',
        ]);

        return back()->with([
            'validatedData' => $validated,
            'showModal' => true,
        ])->withInput();
    }

    public function store(Request $request)
    {
        $request['id'] = Teacher::count() + 1;

        Teacher::create($request->all());

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->only([
            'teacher_name',
            'email',
            'phone',
            'date_of_birth',
            'gender',
            'address',
        ]));
        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }
}
