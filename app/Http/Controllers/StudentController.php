<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStudentRequest;
use App\Models\Gradebook;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddStudentRequest $request)
    {
        $user_id = Auth::user()->id;
        $gradebook = Gradebook::where('user_id', $user_id)->get('id');
        if ($gradebook[0]->id != $request->gradebook_id) {
            return response()->json([
                'error' => 'You are not authorized to add a student to this gradebook',
                'user_id' => $user_id,
                'gradebook[0]->id' => $gradebook[0]->id,
                '$request->gradebook_id' => $request->gradebook_id
            ], 403);
        }
        $student = Student::create($request->validated());

        return response()->json($student);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
    }
}
