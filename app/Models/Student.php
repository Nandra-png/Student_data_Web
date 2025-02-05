<?php

namespace App\Models;
use App\Models\Grade_student;
use App\Models\Departmen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'grade_student_id', 'departmen_id', 'email', 'address'];

    public function grade_student(): BelongsTo
    {
        return $this->belongsTo(Grade_student::class);
    }
    public function departmen(): BelongsTo
    {
        return $this->belongsTo(Departmen::class);
    }

    public static function getGradeWithDepartment()
{
    return DB::table('grade_students')
        ->select(
            'grade_students.id',
            'grade_students.name',
            'departmens.name'
        )
        ->join('departmens', 'grade_students.departmen_id', '=', 'departmens.id')
        ->orderBy('grade_students.name', 'asc');
}
}
