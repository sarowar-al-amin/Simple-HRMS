<?php

use App\Http\Controllers\BonusReviewController;
use App\Http\Controllers\BonusReviewMetadataController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeLevelController;
use App\Http\Controllers\HR\UserController;
use App\Http\Controllers\QuarterController;
use App\Http\Controllers\SalaryReviewController;
use App\Http\Controllers\SBUController;
use App\Http\Controllers\ScoreboardController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\EmployeeReviewController;
use App\Http\Controllers\ExcelLevelImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelExportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\BonusReviewImportController;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();
Route::get('employees', [ EmployeeController::class, 'index'])->name('employees.index');
Route::get('quarters', [QuarterController::class, 'index'])->name('quarters.index');
//Route::resource('users', UserController::class);
//Route::resource('quarters', QuarterController::class);
Route::resource('salary-reviews', SalaryReviewController::class);
Route::get('bonus-reviews-index', [BonusReviewController::class, 'index'])->name('bonus-reviews-index');

// Route::get('employee-reviews/create/{salaryreview}/{sbu}/{user}', [EmployeeReviewController::class, 'create'])->name('employee-reviews.create');
// Route::post('employee-reviews/store/{salaryreview}/{user}', [EmployeeReviewController::class, 'store'])->name('employee-reviews.store');
// Route::get('employee-reviews/show/{salaryreview}/{user}', [EmployeeReviewController::class, 'show'])->name('employee-reviews.show');

Route::get('sbus/index/{salaryreview}', [SBUController::class, 'index'])->name('sbus.index');
Route::get('sbu/show/{salaryreview}/{sbu}', [SBUController::class, 'show'])->name('sbus.show');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/change-Password', [HomeController::class, 'showChangePassword'])->name('show-password');
Route::put('/home', [HomeController::class, 'changePassword'])->name('change-password');

Route::get('level-hierarchy/index', [EmployeeLevelController::class, 'index'])->name('employee-levels');

Route::get('/scoreboard', [ScoreboardController::class, 'index'])->name('scoreboard.show');
Route::post('/scoreboard/action', [ScoreboardController::class, 'action'])->name('scoreboard.action');

Route::get('/scoreboard/sbu', [ScoreboardController::class, 'employeeList'])->name('scoreboard.employeeList');
Route::post('/scoreboard/sbu/{sbu}', [ScoreboardController::class, 'employeeAccordingToSbu']);
Route::get('/scoreboard/bench', [ScoreboardController::class, 'benchReport'])->name('bench.report');

Route::get('/add_employee', [ExcelImportController::class, 'index'])->name('employeeImport');
Route::post('/upload/employee-excel', [ExcelImportController::class, 'upload_excel']);

Route::get('practice', [PracticeController::class, 'index']);

Route::get('employee-reviews', [EmployeeReviewController::class, 'index'])->name('employee-reviews.index');
Route::get('employee-reviews/create/{user}', [EmployeeReviewController::class, 'create'])->name('employee-reviews.create');
Route::post('employee-reviews/store/{user}', [EmployeeReviewController::class, 'store'])->name('employee-reviews.store');
Route::get('employee-reviews/view/{user}', [EmployeeReviewController::class, 'view'])->name('employee-reviews.view');

Route::get('/add_level', [ExcelLevelImport::class, 'index'])->name('levelImport');
Route::post('/upload/level-excel', [ExcelLevelImport::class, 'upload_excel']);

Route::get('/export/salary_review', [ExcelExportController::class, 'exportIntoExcel']);
Route::get('/export/file', [ExcelExportController::class, 'index'])->name('exportFile');

Route::get('/password/reset', [PasswordResetController::class, 'index'])->name('passwordreset');
Route::post('/password/reset', [PasswordResetController::class, 'resetPassword']);
Route::get('/password/resetAll', [PasswordResetController::class, 'resetPasswordAll']);

Route::get('/bonus-reviews', [BonusReviewMetadataController::class, 'index'])->name('bonus-reviews');

Route::get('/profile', [UserProfileController::class, 'index']);
Route::get('/profile/update', [UserProfileController::class, 'update_index']);
Route::post('profile/info_update', [UserProfileController::class, 'update_info']);

Route::get('/import/bonus-review', [BonusReviewImportController::class, 'index'])->name('bonus-review.import');
Route::post('/import/upload-excel', [BonusReviewImportController::class, 'upload_excel']);
