<?php
namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use App\Models\Grade_student;
use App\Models\Departmen;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        $pplg = Departmen::create([
            'name' => 'PPLG',
            'desc' => 'Mengembangkan aplikasi dan game berbasis teknologi'
        ]);

        $animasi2d = Departmen::create([
            'name' => 'ANIMASI 2D',
            'desc' => 'Membuat animasi 2D kreatif'
        ]);

        $animasi3d = Departmen::create([
            'name' => 'ANIMASI 3D',
            'desc' => 'Membuat animasi 3D kreatif'
        ]);

        $dkv = Departmen::create([
            'name' => 'DKV',
            'desc' => 'Merancang desain visual dan media komunikasi'
        ]);

        $dkvTg = Departmen::create([
            'name' => 'DKV TG',
            'desc' => 'Merancang desain Kaos dll'
        ]);

        foreach(['10', '11', '12'] as $tingkat) {
            for($kelas = 1; $kelas <= 2; $kelas++) {
                Grade_student::create([
                    'name' => "$tingkat PPLG $kelas",
                    'departmen_id' => $pplg->id
                ]);
            }
        }

        foreach(['10', '11', '12'] as $tingkat) {
            for($kelas = 1; $kelas <= 3; $kelas++) {
                Grade_student::create([
                    'name' => "$tingkat DKV $kelas",
                    'departmen_id' => $dkv->id
                ]);
            }
        }

        foreach(['10', '11', '12'] as $tingkat) {
            for($kelas = 4; $kelas <= 5; $kelas++) {
                Grade_student::create([
                    'name' => "$tingkat DKV TG $kelas",
                    'departmen_id' => $dkvTg->id
                ]);
            }
        }

        foreach(['10', '11', '12'] as $tingkat) {
            for($kelas = 1; $kelas <= 3; $kelas++) {
                Grade_student::create([
                    'name' => "$tingkat ANIMASI $kelas",
                    'departmen_id' => $animasi2d->id
                ]);
            }
        }

        foreach(['10', '11', '12'] as $tingkat) {
            for($kelas = 4; $kelas <= 5; $kelas++) {
                Grade_student::create([
                    'name' => "$tingkat ANIMASI $kelas",
                    'departmen_id' => $animasi3d->id
                ]);
            }
        }

        Student::factory(100)
            ->withConsistentGradeAndDepartment()
            ->create();
    }
}
