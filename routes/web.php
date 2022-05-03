<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//INDEX
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

//CREATE
Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/teachers',  [TeacherController::class, 'store'])->name('teachers.store');

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students',  [StudentController::class, 'store'])->name('students.store');

Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses',  [CourseController::class, 'store'])->name('courses.store');

//EDIT
Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');

Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');

//SHOW
Route::get('/teachers/{id}/show', [TeacherController::class, 'show'])->name('teachers.show');

Route::get('/students/{id}/show', [StudentController::class, 'show'])->name('students.show');

Route::get('/courses/{id}/show', [CourseController::class, 'show'])->name('courses.show');

//DESTROY
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');