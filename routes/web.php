<?php

use App\Http\Controllers\AcademyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::get(
    '/dashboard',
    [AcademyController::class, 'display']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => '/course'], function () {
        Route::get('/', [AcademyController::class, 'course'])->name('academy.course');
        Route::post('/add', [AcademyController::class, 'addCourse'])->name('addcourse');
        Route::get('/edit/{id}', [AcademyController::class, 'editCourse']);
        Route::post('/edit/{id}', [AcademyController::class, 'updateCourse']);
        Route::get('/delete/{id}', [AcademyController::class, 'delete']);
        Route::get('/view/', [AcademyController::class, 'viewCourse']);
    });

    Route::group(['prefix' => '/student'], function () {
        Route::get('/', [StudentController::class, 'student'])->name('student');
        Route::post('/add', [StudentController::class, 'addStudent'])->name('addstudent');
        Route::get('/display', [StudentController::class, 'studentdisplay'])->name('students');
        Route::get('/delete/{id}', [StudentController::class, 'deleteStudent']);
        Route::get('/edit/{id}', [StudentController::class, 'editStudent']);
        Route::post('/edited/{id}', [StudentController::class, 'updateStudent']);
    });

    Route::group(['prefix' => '/teacher'], function () {
        Route::get('/', [TeacherController::class, 'index'])->name('teacher');
        Route::post('/add', [TeacherController::class, 'addTeacher'])->name('addteacher');
        Route::get('/display', [TeacherController::class, 'teacherDisplay'])->name('teacherdisplay');
        Route::get('/edit/{id}', [TeacherController::class, 'editTeacher']);
        Route::post('/edited/{id}', [TeacherController::class, 'updateTeacher']);
        Route::get('/delete/{id}', [TeacherController::class,  'deleteTeacher']);
    });
});
require __DIR__ . '/auth.php';
