<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:students,email',
            'phone'         => 'required|string|max:20',
            'address'       => 'nullable|string',
            'date_of_birth' => 'nullable|date',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }
    public function show(Student $student)
{
    return view('student.detail', compact('student'));
}

public function edit(Student $student)
{
    return view('student.edit', compact('student'));
}

public function update(Request $request, Student $student)
{
    $validated = $request->validate([
        'name'          => 'required|string|max:255',
        'email'         => ['required', 'email', 'max:255', Rule::unique('students')->ignore($student->id)],
        'phone'         => 'required|string|max:20',
        'address'       => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);

    return redirect()->route('students.show', $student)->with('success', 'Student updated successfully!');
}

public function destroy(Student $student)
{
    $student->delete();

    return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
}
}