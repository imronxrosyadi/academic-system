<?php

use App\Http\Controllers\AlternativeComparisonController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\CriteriaComparisonController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubjectGradeController;
use App\Http\Controllers\ValueWeightController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\CriteriaComparison;

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
    return view('home', [
        "title" => "Annida Ul Hasanah",
        "active" => 'annida ul hasanah'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => 'about',
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');;

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/subject', SubjectController::class);
Route::get('/subject/delete/{id}', [SubjectController::class, 'delete']);

Route::resource('/student', StudentController::class);
Route::get('/student/delete/{id}', [StudentController::class, 'delete']);

Route::resource('/subject-grade', SubjectGradeController::class)->except(['show']);
Route::get('/subject-grade/delete/{type}/{id}/{typeId}', [SubjectGradeController::class, 'delete']);
Route::delete('/subject-grade/dest/{type}/{id}/{typeId}', [SubjectGradeController::class, 'destroy'])->name('subject-grade.destroy');
Route::get('/subject-grade/create/{type}/{id}', [SubjectGradeController::class, 'createByType'])->name('subject-grade.createByType');
Route::get('/subject-grade/edit/{type}/{id}', [SubjectGradeController::class, 'editByType'])->name('subject-grade.editByType');
Route::get('/subject-grade/subjects', [SubjectGradeController::class, 'subjects'])->name('subject-grade.subjects');
Route::get('/subject-grade/subject/{id}', [SubjectGradeController::class, 'subject'])->name('subject-grade.subject');
Route::get('/subject-grade/students', [SubjectGradeController::class, 'students'])->name('subject-grade.students');
Route::get('/subject-grade/student/{id}', [SubjectGradeController::class, 'student'])->name('subject-grade.student');


