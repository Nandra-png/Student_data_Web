<?php

namespace App\Http\Controllers;

use App\Models\Departmen;
use App\Models\Grade_student;
use Illuminate\Http\Request;

class DepartmenController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Departmen",
            'departmens' => Departmen::with(['grade_students', 'students'])->get()
        ];

        if (request()->is('admin/*')) {
            return view('admin.departmen_admin', $data);
        }

        return view('departmen', $data);
    }
}
