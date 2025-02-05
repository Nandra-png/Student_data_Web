<?php

namespace App\Http\Controllers;

use App\Models\Grade_student;
use App\Models\Student;
use App\Models\Departmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        if(request()->is('admin/*')) {
            return view('admin.student_admin', [
                'title' => 'Student Management',
                'students' => Student::orderBy('created_at', 'desc')->paginate(25),

            ]);
        }
        return view('student', [
            'title' => 'Student',
            'students' => Student::orderBy('created_at', 'desc')->paginate(25)

        ]);
    }

    public function addData()
    {
        $grade_students = DB::table('grade_students')
        ->select(
            'grade_students.id',
            'grade_students.name',
            'departmens.name as departmen'
        )
        ->join('departmens', 'grade_students.departmen_id', '=', 'departmens.id')
        ->orderBy('grade_students.name', 'asc')
        ->get();
        return view('add_data', [
            'grade_students' => $grade_students,
            'departmens' => Departmen::all()
        ]);
    }

    public function edit(string $id)
    {
        // Ambil data siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Ambil data grade_students untuk dropdown
        $grade_students = Grade_student::all();

        return view('admin.student.edit', [
            'student' => $student,
            'grade_students' => $grade_students
        ]);
    }

    public function update(Request $request, string $id)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade_student_id' => 'required|exists:grade_students,id',
            'email' => 'required|email|max:50',
            'address' => 'required|string',
        ]);

        // Cari data siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Update data siswa
        $student->update([
            'name' => $validated['name'],
            'grade_student_id' => $validated['grade_student_id'],
            'departmen_id' => Grade_student::find($validated['grade_student_id'])->departmen_id,
            'email' => $validated['email'],
            'address' => $validated['address'],
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect('admin/student')->with('success', 'Student updated successfully.');
    }

    public function destroy(string $id)
    {
        // Cari data siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Hapus data siswa
        $student->delete();

        // Redirect kembali dengan pesan sukses
        return redirect('admin/student')->with('success', 'Student deleted successfully.');
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade_student_id' => 'required|exists:grade_students,id',
            'email' => 'required|email|max:50|unique:students',
            'address' => 'required|string',
        ]);

        // Dapatkan departmen_id dari grade_student yang dipilih
        $grade_student = Grade_student::findOrFail($validated['grade_student_id']);

        // Simpan data student ke dalam tabel students
        Student::create([
            'name' => $validated['name'],
            'grade_student_id' => $validated['grade_student_id'],
            'departmen_id' => $grade_student->departmen_id,
            'email' => $validated['email'],
            'address' => $validated['address'],
        ]);

        // Redirect dengan pesan sukses
        return redirect('admin/student')->with('success', 'Student created successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $students = Student::where('name', 'LIKE', "%{$query}%")->paginate(25);

        return view('admin.student_admin', [
            'title' => 'Student Management',
            'students' => $students
        ]);
    }


    public function search2(Request $request)
    {
        $query = $request->input('query');
        $students = Student::where('name', 'LIKE', "%{$query}%")->paginate(25);

        return view('student', [
            'title' => 'Student',
            'students' => $students
        ]);
    }

}
