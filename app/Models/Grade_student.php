<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasMany;

class Grade_student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'departmen_id'];

    public function departmen()
    {
        return $this->belongsTo(Departmen::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
