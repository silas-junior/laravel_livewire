<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    private $teacher, $request;

    public function __construct(Teacher $teacher, Request $request)
    {
        $this->teacher = $teacher;
        $this->request = $request;
    }

    public function index()
    {
        $teachers = $this->teacher
            ->with(['user'])
            ->orderBy('id')->get();

        return response()->json($teachers);
    }

    public function store()
    {
        $this->validate($this->request, [
            'user_id' => 'required|numeric|exists:users, id',
            'course_id' => 'required|numeric|exists:courses, id',
        ]);

        $teacher = new $this->teacher;
        $teacher->fill($this->request->all());
        $teacher->save();

        return response()->json($teacher->load(['user']), 201);
    }

    public function show($id)
    {
        //
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
