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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->name('dashboard');

Route::get('/gpa', function () {
    return view('welcome');
})->name('gpa.index');

Route::get('/students', [\App\Http\Controllers\StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [\App\Http\Controllers\StudentController::class, 'create'])->name('students.create');
Route::post('/students/validate-create', [\App\Http\Controllers\StudentController::class, 'validateStore'])->name('students.create.validate');
Route::post('/students/create', [\App\Http\Controllers\StudentController::class, 'store'])->name('students.store');

Route::get('/departments', [\App\Http\Controllers\DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/create', [\App\Http\Controllers\DepartmentController::class, 'create'])->name('departments.create');
Route::post('/departments/validate-create', [\App\Http\Controllers\DepartmentController::class, 'validateStore'])->name('departments.create.validate');
Route::post('/departments/create', [\App\Http\Controllers\DepartmentController::class, 'store'])->name('departments.store');