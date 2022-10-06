<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\employeeRecordController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('index');
});
// Route::get('/admin', function () {
//     return view('admin.index');
// });
// Route::get('/near_miss', function () {
//     return view('admin.near_miss');
// });
Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'showLogin')->name('login');
    Route::post('login', 'login')->name('login');
    Route::get('register', 'register_view')->name('register');
    Route::post('register', 'register')->name('register');
    Route::get('logout', 'logout')->name('logout');
});
Route::middleware(['auth'])->controller(DashboardController::class)->group(function () {
    Route::get('/admin', 'dashboard')->name('admin');
    Route::get('near_missTable', 'listNearMiss')->name('near_missTable');
    Route::get('/near_missTable/{id}', 'destroy')->name('near_miss_destroy');
     Route::get('/near_missEdit/{id}', 'edit')->name('near_missEdit');
});
Route::controller(employeeRecordController::class)->group(function () {
    Route::get('/near-miss', 'register')->name('near-miss'); //for view jsa form
    Route::post('/near-miss', 'register')->name('near-miss.register'); //for submit jsa form data
   
    // Route::get('/jsa-templates/{id}', 'destroy')->name('jsa-destroy');
    // Route::get('/generatePDF/{id}', 'generatePDF')->name('generatePDF');
    // Route::get('/export', 'export')->name('export');
});
