<?php

use App\Http\Controllers\EmployeeLevelController;
use App\Http\Controllers\EmployeeReviewController;
use App\Http\Controllers\HR\UserController;
use App\Http\Controllers\QuarterController;
use App\Http\Controllers\SalaryReviewController;
use App\Http\Controllers\SBUController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Auth::routes();
Route::resource('users', UserController::class);
Route::resource('quarters', QuarterController::class);
Route::resource('salary-reviews', SalaryReviewController::class);

Route::get('employee-reviews/create/{user}', [EmployeeReviewController::class, 'create'])->name('employee-review.create');
Route::post('employee-reviews/store/{user}', [EmployeeReviewController::class, 'store'])->name('employee-review.store');

Route::get('sbu/index', [SBUController::class, 'index'])->name('sbu-list');
Route::get('sbu/{name}', [SBUController::class, 'show'])->name('sbu-employee-list');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('level-hierarchy/index', [EmployeeLevelController::class, 'index'])->name('employee-levels');