<?php

use App\Http\Controllers\Admin\AcademicYearController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\StudentAssignmentController;
use App\Http\Controllers\Admin\StudentController;
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

Auth::routes();

Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::resource('majors', MajorController::class);
    Route::resource('academic_years', AcademicYearController::class);
    Route::resource('classrooms', ClassroomController::class);
    Route::resource('students', StudentController::class);

    Route::get('assign', [StudentAssignmentController::class, 'index'])->name('assign.index');
    Route::get('assign/create', [StudentAssignmentController::class, 'create'])->name('assign.create');
    Route::post('assign', [StudentAssignmentController::class, 'store'])->name('assign.store');
    Route::post('assign/delete', [StudentAssignmentController::class, 'delete'])->name('assign.delete');
});

