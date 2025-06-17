<?php

namespace App\Http\Controllers;

use App\Models\Gpa;
use App\Models\Student;
use Illuminate\Http\Request;

class GpaController extends Controller
{
    public function index()
    {
        return view('gpa.index', [
            'gpas' => Gpa::with([
                'student.department.course.teacher'
            ])->get()
        ]);
    }

    public function create()
    {
        return view('gpa.create', [
            'students' => Student::all()
        ]);
    }

    public function validateStore(Request $request)
    {
        $validated = $request->validate([
            'gpa' => 'required|integer|min:1',
            'semester' => 'required|in:' . implode(',', \App\Enums\CurrentSemester::values()),
            'student_id' => 'required|exists:student,student_id',
        ]);
        return back()->with([
            'validatedData' => $validated,
            'showModal' => true,
        ])->withInput();
    }

    public function store(Request $request)
    {
        $request['gpa_id'] = Gpa::count() + 1;

        Gpa::create($request->all());

        return redirect()->route('gpas.index')->with('success', 'Gpa recorded successfully.');
    }

    public function edit($id)
    {
        $gpa = Gpa::findOrFail($id);
        $students = Student::all();
        return view('gpa.edit', compact('gpa', 'students'));
    }

    public function update(Request $request, $id)
    {
        $gpa = Gpa::findOrFail($id);
        $gpa->update($request->only([
            'gpa',
            'semester',
            'student_id',
        ]));
        return redirect()->route('gpas.index')->with('success', 'Gpa updated successfully.');
    }
}
