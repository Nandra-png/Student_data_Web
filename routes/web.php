<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmenController;
use App\Http\Controllers\Grade_studentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/contact',[ContactController::class, 'index']);
Route::get('/add-data', [StudentController::class, 'addData'])->name('add.data');
Route::get('/admin_dashboard', [AdminController::class,'index']);

//User
Route::get('/departmen', [DepartmenController::class, 'index']);
Route::get('/grade_student', [Grade_studentController::class,'index']);
Route::get('/student',[StudentController::class, 'index'])->name('students.index');

//Admin
Route::get('/admin/departmen', [DepartmenController::class, 'index']);
Route::get('/admin/grade_student', [Grade_studentController::class,'index']);
Route::get('admin/student',[StudentController::class, 'index']);
Route::get('/admin/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/admin/students/update/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/admin/students/delete/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::post('/admin/students/store', [StudentController::class, 'store'])->name('students.store');
Route::get('/add-data-grade', [Grade_studentController::class, 'addDataGrade'])->name('add.data.grade');
Route::post('/admin/grade_student/store', [Grade_studentController::class, 'store'])->name('grade.store');
Route::get('/admin/grade_student/edit/{id}', [Grade_studentController::class, 'edit'])->name('grade.edit');
Route::put('/admin/grade_student/update/{id}', [Grade_studentController::class, 'update'])->name('grade.update');
Route::get('/add-data-department', [DepartmenController::class, 'addDataDepartment'])->name('add.data.department');
Route::post('/admin/department/store', [DepartmenController::class, 'store'])->name('department.store');
