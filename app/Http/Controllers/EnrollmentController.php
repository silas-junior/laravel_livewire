<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{

    private $enrollment, $request;

    public function __construct(Enrollment $enrollment, Request $request)
    {

        $this->enrollment = $enrollment;
        $this->request = $request;
    }

    public function index()
    {

    }

    public function store()
    {
//        $enrollment->enrollment_date = now()->format('Y-m-d H:i:s');
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
