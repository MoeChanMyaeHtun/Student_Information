<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('departments.index', [
            'departments' => Department::all(),
        ]);
    }

    public function create()
    {
        return view('departments.create');
    }

    public function validateStore(Request $request)
    {
        $validated = $request->validate([
            'department_name' => 'required|string|max:255|unique:department,department_name',
        ]);

        return back()->with([
            'validatedData' => $validated,
            'showModal' => true,
        ])->withInput();
    }

    public function store(Request $request)
    {
        Department::create($request->all());

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->update([
            'department_name' => $request->department_name,
        ]);
        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }
}
