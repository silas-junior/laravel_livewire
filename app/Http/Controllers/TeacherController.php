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

//        dd(now()->format('Y-m-d H:i:s'));
    }

    public function store()
    {
        //
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
