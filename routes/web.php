<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProgressReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BusinessUnitController;

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
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::resource('progress_reports', ProgressReportController::class);
    Route::resource('users', UserController::class);
    Route::resource('business_units', BusinessUnitController::class);
});

// web.php or routes.php

Route::get('progress_reports/create/{projectId}', [ProgressReportController::class, 'create'])->name('progress_reports.create');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('users/{user}/profile', [UserController::class, 'show'])->name('profile');
Route::get('users/{user}/edit-password', [UserController::class, 'editPassword'])->name('profile.edit_password');
Route::put('users/{user}/update-password', [UserController::class, 'updatePassword'])->name('profile.update_password');


