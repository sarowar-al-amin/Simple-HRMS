<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeLevelController;
use App\Http\Controllers\EmployeeReviewController;
use App\Http\Controllers\HR\UserController;
use App\Http\Controllers\QuarterController;
use App\Http\Controllers\SalaryReviewController;
use App\Http\Controllers\SBUController;
use App\Http\Controllers\ScoreboardController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\PracticeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect('login');
});

Auth::routes();
Route::get('employees/index', [ EmployeeController::class, 'index'])->name('employees.index');
//Route::resource('users', UserController::class);
Route::resource('quarters', QuarterController::class);
Route::resource('salary-reviews', SalaryReviewController::class);

Route::get('employee-reviews/create/{salaryreview}/{sbu}/{user}', [EmployeeReviewController::class, 'create'])->name('employee-reviews.create');
Route::post('employee-reviews/store/{salaryreview}/{user}', [EmployeeReviewController::class, 'store'])->name('employee-reviews.store');
Route::get('employee-reviews/show/{salaryreview}/{user}', [EmployeeReviewController::class, 'show'])->name('employee-reviews.show');

Route::get('sbus/index/{salaryreview}', [SBUController::class, 'index'])->name('sbus.index');
Route::get('sbu/show/{salaryreview}/{sbu}', [SBUController::class, 'show'])->name('sbus.show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('level-hierarchy/index', [EmployeeLevelController::class, 'index'])->name('employee-levels');

Route::get('/scoreboard', [ScoreboardController::class, 'index'])->name('scoreboard.show');
Route::post('/scoreboard/action', [ScoreboardController::class, 'action'])->name('scoreboard.action');

Route::get('/scoreboard/sbu', [ScoreboardController::class, 'employeeList'])->name('scoreboard.employeeList');
Route::post('/scoreboard/sbu/{sbu}', [ScoreboardController::class, 'employeeAccordingToSbu']);
Route::get('/scoreboard/bench', [ScoreboardController::class, 'benchReport'])->name('bench.report');

Route::get('/add_employee', [ExcelImportController::class, 'index'])->name('employeeImport');
Route::post('/upload/employee-excel', [ExcelImportController::class, 'upload_excel']);

Route::get('practice', [PracticeController::class, 'index']);