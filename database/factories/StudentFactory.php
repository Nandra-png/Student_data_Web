<?php

namespace Database\Factories;

use App\Models\Grade_student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grade = \App\Models\Grade_student::inRandomOrder()->first();
        return [
            'name' => fake()->name(),
            'grade_student_id' => null,
            'departmen_id' => null,
            'email' => fake()->unique()->safeEmail,
            'address' => fake()->address(),
        ];
    }

    public function withConsistentGradeAndDepartment()
    {
        return $this->afterMaking(function ($student) {
            $grade = Grade_student::inRandomOrder()->first();
            $student->grade_student_id = $grade->id;
            $student->departmen_id = $grade->departmen_id;
        });
    }
}
