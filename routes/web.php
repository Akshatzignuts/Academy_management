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

    Route::group(['prefix' => '/course'], function () {
        Route::get('/', [AcademyController::class, 'course'])->name('academy.course');
        Route::post('/add', [AcademyController::class, 'addCourse'])->name('addcourse');
        Route::get('/edit/{id}', [AcademyController::class, 'editCourse']);
        Route::post('/edit/{id}', [AcademyController::class, 'updateCourse']);
        Route::get('/delete/{id}', [AcademyController::class, 'delete']);
        Route::get('/view/', [AcademyController::class, 'viewCourse']);
    });
    Route::get('/dashboard', [AcademyController::class, 'display']);

    Route::group(['prefix' => '/student'], function () {
        Route::get('/', [StudentController::class, 'student'])->name('student');
        Route::post('/add', [StudentController::class, 'addStudent'])->name('addstudent');
        Route::get('/display', [StudentController::class, 'studentdisplay'])->name('students');
        Route::get('/delete/{id}', [StudentController::class, 'deleteStudent']);
        Route::get('/edit/{id}', [StudentController::class, 'editStudent']);
        Route::post('/edited/{id}', [StudentController::class, 'updateStudent']);
    });

    Route::group(['prefix' => '/teacher'], function () {
        Route::get('/', [TeacherController::class, 'index'])->name('academy.teacher');
        Route::post('/add', [TeacherController::class, 'addTeacher'])->name('addteacher');
        Route::get('/display', [TeacherController::class, 'teacherDisplay'])->name('teacherdisplay');
    });
});
require __DIR__ . '/auth.php';
