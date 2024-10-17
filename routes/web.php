<?php

use App\Http\Controllers\AttendanceDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
    return view('login');
});


Route::prefix('admin')->group(function () {
    Route::get('/', [
        'as' => 'admin.index',
        'uses' => 'App\Http\Controllers\AdminController@index',
    ]);

    Route::post('/login', [
        'as' => 'admin.login',
        'uses' => 'App\Http\Controllers\AdminController@login',
    ]);

    Route::resource('student', App\Http\Controllers\StudentController::class)->middleware('can:admin');

    Route::resource('permission', App\Http\Controllers\PermissionController::class)->middleware('can:admin');

    Route::resource('user', App\Http\Controllers\UserController::class)->middleware('can:admin');

    Route::resource('classes', App\Http\Controllers\ClassesController::class)->middleware('can:admin');

    Route::resource('classroom', App\Http\Controllers\ClassroomController::class)->middleware('can:admin');

    Route::resource('subject', App\Http\Controllers\SubjectController::class)->middleware('can:admin');

    Route::resource('attendance', App\Http\Controllers\AttendanceController::class)->middleware('can:admin');

    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    Route::post('/search/{id}', [App\Http\Controllers\AttendanceDetailController::class, 'search'])->name('search');

    Route::post('/attendancePerform/{id}', [App\Http\Controllers\AttendanceDetailController::class, 'attendancePerform'])->name('perform');

    Route::post('/attendanceUpdate/{id}', [App\Http\Controllers\AttendanceDetailController::class, 'attendanceUpdate'])->name('update');

    Route::prefix('work')->group(function () {
        Route::get('/', [
            'as' => 'work.index',
            'uses' => 'App\Http\Controllers\AttendanceDetailController@index',
        ]);

        Route::get('/showAttendance/{id}', [
            'as' => 'work.showAttendance',
            'uses' => 'App\Http\Controllers\AttendanceDetailController@showAttendance',
        ]);
    });
});






