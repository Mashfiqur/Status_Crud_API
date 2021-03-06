<?php

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
    return view('welcome_page');
});

Route::get('/consume_api', function () {
    return view('consume_api_JQuery');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Status
Route::post('/status_post', [App\Http\Controllers\StatusController::class, 'post_status']);
Route::post('/status/update',[App\Http\Controllers\StatusController::class, 'status_update']);
Route::get('/status/delete/{id}', [App\Http\Controllers\StatusController::class, 'status_delete']);

