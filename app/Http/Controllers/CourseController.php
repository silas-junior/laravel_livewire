<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    private $course, $request;

    public function __construct(Course $course, Request $request)
    {

        $this->course = $course;
        $this->request = $request;
    }

    public function index()
    {

    }

    public function store()
    {
        $this->request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'teacher_id' => 'required|numeric'
        ]);

        $course = new $this->course;
        $course->fill($this->request->all());
        $course->save();

        return response()->json($course->load(['teacher.user', 'enrollments']), '201');
    }

    public function show($id)
    {
        $course = $this->course
            ->with(['teacher.user', 'enrollments.students'])
            ->findOrFail($id);

        return response()->json($course);
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
