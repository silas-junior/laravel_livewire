<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    private $student, $request;

    public function __construct(Student $student, Request $request)
    {
        $this->student = $student;
        $this->request = $request;
    }

    public function index()
    {
        $students = $this->student
            ->with(['user'])
            ->orderBy('id')->get();

        return response()->json($students);
    }

    public function store()
    {
        $this->request->validate([
            'user_id' => 'required|numeric',
        ]);

        $user_id = $this->request->get('user_id');
        $user = User::where('id', '=', $user_id)->first();

        if ($user) {
            $student = new $this->student;
            $student->fill($this->request->all());
            $student->save();

            return response()->json($student->load(['user']), 201);
        }
        return response()->json([
            'message' => 'The chosen user does not exist'
        ], 404);
    }

    public function show($id)
    {
        $student = $this->student->findOrFail($id);
        return response()->json($student);
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
