<?php

use App\Http\Controllers\AttendanceController;
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
    return view('welcome');
});

Route::get('student/index', [AttendanceController::class, 'index'])->name('student.index');
Route::post('student/store', [AttendanceController::class, 'store'])->name('student.store');

Route::get('student/attendancesheet', [AttendanceController::class, 'attendancesheet'])->name('student.attendancesheet');

