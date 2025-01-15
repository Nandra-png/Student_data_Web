<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departmen extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'desc'];

    public function grade_students()
    {
        return $this->hasMany(Grade_student::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
