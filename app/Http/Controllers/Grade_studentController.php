<?php

namespace App\Http\Controllers;
use App\Models\Grade_student;
use Illuminate\Http\Request;

class Grade_studentController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Grade student",
            'grade_students' => Grade_student::with('students')->get()
        ];

        if(request()->is('admin/*')){
            return view('admin/grade_student_admin', $data);
        }
        return view('grade_student', $data);
    }
}
