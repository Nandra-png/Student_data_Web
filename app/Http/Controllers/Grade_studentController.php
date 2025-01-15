<?php

namespace App\Http\Controllers;
use App\Models\Grade_student;
use Illuminate\Http\Request;
use App\Models\Departmen;

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

    public function addDataGrade()
    {
        return view('add_data_grade', [
            'title' => 'Add New Grade',
            'departmens' => Departmen::all()
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'departmen_id' => 'required|exists:departmens,id'
        ]);

        // Simpan data grade ke dalam tabel grade_students
        Grade_student::create($validated);

        // Redirect dengan pesan sukses
        return redirect('admin/grade_student')->with('success', 'Grade created successfully.');
    }

    public function edit(string $id)
    {
        // Ambil data grade berdasarkan ID
        $grade_student = Grade_student::findOrFail($id);
        
        return view('edit_data_grade', [
            'title' => 'Edit Grade',
            'grade_student' => $grade_student,
            'departmens' => Departmen::all()
        ]);
    }

    public function update(Request $request, string $id)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'departmen_id' => 'required|exists:departmens,id'
        ]);

        // Cari data grade berdasarkan ID
        $grade_student = Grade_student::findOrFail($id);

        // Update data grade
        $grade_student->update($validated);

        // Redirect dengan pesan sukses
        return redirect('admin/grade_student')->with('success', 'Grade updated successfully.');
    }
}
