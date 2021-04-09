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
            'user_id' => 'required|numeric',
        ]);

        $teacher = new $this->teacher;
        $teacher->fill($this->request->all());
        $teacher->save();

        return response()->json($teacher->load(['user', 'courses']), 201);
    }

    public function show($id)
    {
        $teacher = $this->teacher
            ->with(['user', 'courses'])
            ->findOrFail($id);

        return response()->json($teacher);
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
