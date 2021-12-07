<?php

use App\Http\Controllers\EmployeeLevelController;
use App\Http\Controllers\EmployeeReviewController;
use App\Http\Controllers\HR\UserController;
use App\Http\Controllers\QuarterController;
use App\Http\Controllers\SalaryReviewController;
use App\Http\Controllers\SBUController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect('login');
});

Auth::routes();
Route::resource('users', UserController::class);
Route::resource('quarters', QuarterController::class);
Route::resource('salary-reviews', SalaryReviewController::class);

Route::get('employee-reviews/create/{user}', [EmployeeReviewController::class, 'create'])->name('employee-reviews.create');
Route::post('employee-reviews/store/{user}', [EmployeeReviewController::class, 'store'])->name('employee-reviews.store');

Route::get('sbus/index/{salaryreview}', [SBUController::class, 'index'])->name('sbus.index');
Route::get('sbu/{salaryreview}/{name}', [SBUController::class, 'show'])->name('sbus.show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('level-hierarchy/index', [EmployeeLevelController::class, 'index'])->name('employee-levels');