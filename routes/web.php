<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('dashboard');

Route::get('/students', [\App\Http\Controllers\StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [\App\Http\Controllers\StudentController::class, 'create'])->name('students.create');
Route::post('/students/validate-create', [\App\Http\Controllers\StudentController::class, 'validateStore'])->name('students.create.validate');
Route::post('/students/create', [\App\Http\Controllers\StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [App\Http\Controllers\StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('students.delete');

Route::get('/gpas', [\App\Http\Controllers\GpaController::class, 'index'])->name('gpas.index');
Route::get('/gpas/create', [\App\Http\Controllers\GpaController::class, 'create'])->name('gpas.create');
Route::post('/gpas/validate-create', [\App\Http\Controllers\GpaController::class, 'validateStore'])->name('gpas.create.validate');
Route::post('/gpas/create', [\App\Http\Controllers\GpaController::class, 'store'])->name('gpas.store');
Route::get('/gpas/{id}', [App\Http\Controllers\GpaController::class, 'edit'])->name('gpas.edit');
Route::put('/gpas/{id}', [App\Http\Controllers\GpaController::class, 'update'])->name('gpas.update');

Route::get('/departments', [\App\Http\Controllers\DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/create', [\App\Http\Controllers\DepartmentController::class, 'create'])->name('departments.create');
Route::post('/departments/validate-create', [\App\Http\Controllers\DepartmentController::class, 'validateStore'])->name('departments.create.validate');
Route::post('/departments/create', [\App\Http\Controllers\DepartmentController::class, 'store'])->name('departments.store');
Route::get('/department/{id}', [App\Http\Controllers\DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('/department/{id}', [App\Http\Controllers\DepartmentController::class, 'update'])->name('departments.update');

Route::get('/courses', [\App\Http\Controllers\CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [\App\Http\Controllers\CourseController::class, 'create'])->name('courses.create');
Route::post('/courses/validate-create', [\App\Http\Controllers\CourseController::class, 'validateStore'])->name('courses.create.validate');
Route::post('/courses/create', [\App\Http\Controllers\CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{id}', [App\Http\Controllers\CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{id}', [App\Http\Controllers\CourseController::class, 'update'])->name('courses.update');

Route::get('/attendance', [\App\Http\Controllers\AttendanceController::class, 'index'])->name('attendance.index');
Route::get('/attendance/create', [\App\Http\Controllers\AttendanceController::class, 'create'])->name('attendance.create');
Route::post('/attendance/validate-create', [\App\Http\Controllers\AttendanceController::class, 'validateStore'])->name('attendance.create.validate');
Route::post('/attendance/create', [\App\Http\Controllers\AttendanceController::class, 'store'])->name('attendance.store');
Route::get('/attendance/{id}', [App\Http\Controllers\AttendanceController::class, 'edit'])->name('attendance.edit');
Route::put('/attendance/{id}', [App\Http\Controllers\AttendanceController::class, 'update'])->name('attendance.update');

Route::get('/teachers', [\App\Http\Controllers\TeacherController::class, 'index'])->name('teachers.index');
Route::get('/teachers/create', [\App\Http\Controllers\TeacherController::class, 'create'])->name('teachers.create');
Route::post('/teachers/validate-create', [\App\Http\Controllers\TeacherController::class, 'validateStore'])->name('teachers.create.validate');
Route::post('/teachers/create', [\App\Http\Controllers\TeacherController::class, 'store'])->name('teachers.store');
Route::get('/teachers/{id}', [App\Http\Controllers\TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('/teachers/{id}', [App\Http\Controllers\TeacherController::class, 'update'])->name('teachers.update');
