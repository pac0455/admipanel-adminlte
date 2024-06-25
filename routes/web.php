<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\UserController;
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

Auth::routes();
/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) { */
    /* return $request->user(); */
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('calendar', CalendarController::class);
    Route::resource('user', UserController::class);
    Route::resource('holidays', HolidayController::class);
/* }); */



