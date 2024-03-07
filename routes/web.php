<?php

use App\Http\Controllers\AcademyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
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
    Route::get('/student/{course_id}', [AcademyController::class, 'student'])->name('academy.student');
    Route::post('/course/add', [AcademyController::class, 'addcourse'])->name('addcourse');
    Route::get('/dashboard', [AcademyController::class, 'display']);
    Route::get('/course/delete/{id}', [AcademyController::class, 'delete']);
    Route::get('/payments', [AcademyController::class, 'payment'])->name('academy.payment');
    Route::post('/payment/add', [AcademyController::class, 'addPayment'])->name('addpayment');

    Route::post('/student/add', [StudentController::class, 'addstudent'])->name('addstudent');
    Route::get('/student/display', [StudentController::class, 'studentdisplay'])->name('studentdisplay');
    Route::get('/students/{id}', [StudentController::class, 'displaystudent']);
});
require __DIR__ . '/auth.php';