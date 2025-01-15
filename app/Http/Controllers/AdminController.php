<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Departmen;
use App\Models\Grade_student;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'students' => Student::all(),
            'departments' => Departmen::all(),
            'grades' => Grade_student::all(),
        ];

        return view('components.admin-layout', $data);
    }
}
