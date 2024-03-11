<?php

use App\Http\Controllers\AcademyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/courses', [AcademyController::class, 'course'])->name('academy.courses');
    Route::post('/course/add', [AcademyController::class, 'addCourse'])->name('addcourse');
    Route::get('/dashboard', [AcademyController::class, 'display']);
    Route::get('course/edit/{id}', [AcademyController::class, 'editCourse']);
    Route::post('course/edit/{id}', [AcademyController::class, 'updateCourse']);
    Route::get('/course/delete/{id}', [AcademyController::class, 'delete']);


    Route::get('/student/', [StudentController::class, 'student'])->name('academy.student');
    Route::get('/payments', [StudentController::class, 'payment'])->name('academy.payment');
    Route::post('/student/add', [StudentController::class, 'addStudent'])->name('addstudent');
    Route::get('/students/', [StudentController::class, 'studentdisplay'])->name('students');

    Route::get('/teacher', [TeacherController::class, 'index'])->name('academy.teacher');
    Route::post('/teacher/add', [TeacherController::class, 'addTeacher'])->name('addteacher');
    Route::get('/teacher/display', [TeacherController::class, 'teacherDisplay'])->name('teacherdisplay');
});
require __DIR__ . '/auth.php';
