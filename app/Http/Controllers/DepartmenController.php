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

    public function addDataDepartment()
    {
        return view('add_data_department', [
            'title' => 'Add New Department'
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string'
        ]);

        // Simpan data department ke dalam tabel departmens
        Departmen::create($validated);

        // Redirect dengan pesan sukses
        return redirect('admin/departmen')->with('success', 'Department created successfully.');
    }
}
