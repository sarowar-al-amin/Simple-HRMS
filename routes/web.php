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
use App\Http\Controllers\EmployeeSalaryReviewController;
use App\Http\Controllers\EmployeeBonusCalculationController;
use App\Http\Controllers\PreviousBonusAndSalaryReviewController;
use App\Http\Controllers\PreviousBonusReviewController;
use App\Http\Controllers\EmployeeActivationController;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();
Route::get('employees', [ EmployeeController::class, 'index'])->name('employees.index');
Route::get('/add/new-employee', [ EmployeeController::class, 'addNewEmployee']);
Route::get('quarters', [QuarterController::class, 'index'])->name('quarters.index');
Route::post('/insert/new-employee', [EmployeeController::class, 'insertNewEmployee']);
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

Route::get('practice', [PracticeController::class, 'index'])->name('overview');

Route::get('employee-reviews', [EmployeeReviewController::class, 'index'])->name('employee-reviews.index');
Route::get('employee-reviews/create/{user}', [EmployeeReviewController::class, 'create'])->name('employee-reviews.create');
Route::post('employee-reviews/store/{user}', [EmployeeReviewController::class, 'store'])->name('employee-reviews.store');
Route::get('employee-reviews/view/{user}', [EmployeeReviewController::class, 'view'])->name('employee-reviews.view');

Route::get('/add_level', [ExcelLevelImport::class, 'index'])->name('levelImport');
Route::post('/upload/level-excel', [ExcelLevelImport::class, 'upload_excel']);

// Route::get('/export/salary_review', [ExcelExportController::class, 'exportIntoExcel']);
// Route::get('/export/file', [ExcelExportController::class, 'index'])->name('exportFile');
// Route::get('/export/bounus-review-template', [ExcelExportController::class, 'exportBonusReviewTemplate']);
// Route::get('/export/bonus-review',[ExcelExportController::class, 'exportBonusReviewView'])->name('bonusReviewExport');
// Route::get('/exportation/bonus_review', [ExcelExportController::class, 'exportBonusReview']);
// Route::get('/export/all-users', [ExcelExportController::class, 'exportAllUsers']);
Route::get('/export/excel-user-template', [ExcelExportController::class, 'userImportTemplate']);

Route::get('/password/reset', [PasswordResetController::class, 'index'])->name('passwordreset');
Route::post('/password/reset', [PasswordResetController::class, 'resetPassword']);
Route::get('/password/resetAll', [PasswordResetController::class, 'resetPasswordAll']);

// Route::get('/bonus-reviews', [BonusReviewMetadataController::class, 'index'])->name('bonus-reviews');

Route::get('/profile', [UserProfileController::class, 'index']);
Route::get('/profile/update', [UserProfileController::class, 'update_index']);
Route::post('profile/info_update', [UserProfileController::class, 'update_info']);

// Route::get('/import/bonus-review', [BonusReviewImportController::class, 'index'])->name('bonus-review.import');
// Route::post('/import/upload-excel', [BonusReviewImportController::class, 'upload_excel']);


Route::get('employee-salary-review', [EmployeeSalaryReviewController::class, 'index'])->name('employee-salary-reviews.index');
Route::post('employee-salary-review/store/{user}', [EmployeeSalaryReviewController::class, 'store'])->name('employee-salary-reviews.store');

Route::get('employee-bonus-review-calculation', [EmployeeBonusCalculationController::class, 'index'])->name('employee-bonus-reviews-calculation.index');
Route::get('employee-bonus-review-calculation/create/{user}', [EmployeeBonusCalculationController::class, 'create'])->name('employee-bonus-reviews-calculation.create');
Route::post('employee-bonus-review-calculation/store/{user}', [EmployeeBonusCalculationController::class, 'store'])->name('employee-bonus-reviews-calculation.store');
Route::get('employee-bonus-review-calculation/view/{user}', [EmployeeBonusCalculationController::class, 'view'])->name('employee-bonus-reviews-calculation.view');

// Previous history exploring
// Route::get('previous-salary-review',[PreviousBonusAndSalaryReviewController::class, 'test_idea'])->name('checking_idea');
Route::get('previous-salary-review/{user}', [PreviousBonusAndSalaryReviewController::class,'salaryReview'])->name('previous-salary-review.view');
Route::get('previous-bonus-review/{user}', [PreviousBonusAndSalaryReviewController::class,'bonusReview'])->name('previous-bonus-review.view');
Route::post('previous-salary-review/{user}', [PreviousBonusAndSalaryReviewController::class,'previousSalaryReviewUpdate'])->name('previous-salary-reviews.store');
Route::post('previous-bonus-review/{user}', [PreviousBonusAndSalaryReviewController::class,'previousBonusReviewUpdate'])->name('previous-bonus-reviews.store');

// Route previous bonus history
Route::get('previous-bonus-review-calculation/{user}', [PreviousBonusReviewController::class,'salaryReview'])->name('previous-bonus-review-calculation.view');
// Route::get('previous-bonus-review/{user}', [PreviousBonusReviewController::class,'bonusReview'])->name('previous-bonus-review.view');
Route::post('previous-bonus-review-review/{user}', [PreviousBonusReviewController::class,'previousSalaryReviewUpdate'])->name('previous-bonus-review-calculation.store');
// Route::post('previous-bonus-review/{user}', [PreviousBonusAndSalaryReviewController::class,'previousBonusReviewUpdate'])->name('previous-bonus-reviews.store');

// Route to serve activation purpose 
Route::get('employee-activation-deactivation',[EmployeeActivationController::class, 'index'])->name('activation.index');
Route::post('employement-status/change',[EmployeeActivationController::class, 'update'])->name('deactivate.employment-status');
Route::get('inactive-employees',[EmployeeActivationController::class, 'show'])->name('inactive.employeeList');
// URL::forceScheme('https');
