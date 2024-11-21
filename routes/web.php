<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManualAttendance;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceHistory;
use App\Http\Controllers\AttendanceHistoryController;
use App\Http\Controllers\UserAttendance;
use App\Http\Controllers\UserLogoutAttendance;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\updateTimeInBtn;
use App\Http\Controllers\AddNewUserController;
use App\Http\Controllers\AllUsers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\CSVImportController;


Route::get('/', function () {
    return view('landing');
});

Route::get('/download', function () {
    return view('download');
});

Route::get('/restricted', function () {
    return view('restricted');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');

    Route::post('/user-attendance', [UserAttendance::class, 'store'])->name('user-attendance.store');

    Route::post('/profile/update-missing', [ProfileController::class, 'updateMissing'])->name('profile.update.missing');
    
    Route::post('/user-logout-attendance', [UserLogoutAttendance::class, 'store'])->name('user-logout-attendance.store');

    Route::post('/logAttendance', [LogoutController::class, 'store'])->name('logAttendance.store');

    Route::get('/time-in-students', [AttendanceController::class, 'getTimeInStudents'])->name('timeInStudents');

});

Route::middleware(['auth', 'adminOrSuperadmin'])->group(function () {
    Route::post('/update-boolean/{id}', [updateTimeInBtn::class, 'updateBoolean'])->name('update.boolean');

    Route::get('/fetch-user-details/{id}', [UserController::class, 'fetchUserDetails'])->name('fetchUserDetails');

    Route::get('/students/export-pdf', [StudentController::class, 'exportPdf'])->name('students.exportPdf');
    
    Route::get('admin/manual',[ManualAttendance::class,'index']);
    Route::get('admin/dashboard',[HomeController::class,'index']);
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/attendance-data', [AttendanceHistory::class, 'getAttendanceData'])->name('attendance.data');

    Route::get('admin/history',[AttendanceHistory::class,'history']);
    Route::get('admin/history', [AttendanceHistoryController::class, 'showAttendanceHistory'])->name('admin.history');

    Route::post('create-session', [AdminController::class, 'createSession'])->name('createSession');
    Route::get('session-window', [AdminController::class, 'sessionWindow'])->name('sessionWindow');
    Route::post('unset-session', [AdminController::class, 'unsetSession'])->name('unsetSession');

    Route::post('create-session-logout', [AdminController::class, 'createSessionLogout'])->name('createSessionLogout');
    Route::get('session-window-logout', [AdminController::class, 'sessionWindowLogout'])->name('sessionWindowLogout');
    Route::post('unset-session-logout', [AdminController::class, 'unsetSessionLogout'])->name('unsetSessionLogout');

    Route::get('/admin/users', [AllUsers::class, 'index'])->name('admin.users');
    Route::get('/admin/users/{id}/edit', [AllUsers::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/update', [AllUsers::class, 'update'])->name('users.update');
    Route::put('/admin/users/store', [AllUsers::class, 'store'])->name('users.store');
    Route::get('/admin/users/{id}/promote', [AllUsers::class, 'getUsertype'])->name('users.getUsertype');
    Route::put('/admin/users/promote', [AllUsers::class, 'promote'])->name('users.promote');
    Route::put('/admin/users/attendance', [AllUsers::class, 'manualStore'])->name('users.manualStore');

    Route::get('/import-csv', [CSVImportController::class, 'showImportPage'])->name('import.csv');
    Route::post('/import-csv', [CSVImportController::class, 'import'])->name('import.csv.upload');
});


Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('password.request');

Route::get('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('password.email');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            ->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
            ->name('password.store');    

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/toggle-logged-in', [AdminController::class, 'toggleLoggedIn'])->name('admin.toggleLoggedIn');
});

    Route::get('/generate-token', [TokenController::class, 'generateToken']);

require __DIR__.'/auth.php';


