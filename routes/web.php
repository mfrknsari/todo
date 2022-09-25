<?php

use App\Http\Controllers\Log\Controllers\LogController;
use App\Http\Controllers\Todo\Controllers\TodoController;
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
    return view('welcome');
});

Auth::routes();



Route::group([
    'middleware' => [
        'auth'
    ]
], function () {
        Route::resource('/todo',TodoController::class);
        Route::get('/todo/status-update/{id}',[TodoController::class,'statusUpdate'])->name('todo.statusUpdate');
        Route::resource('/log',LogController::class)->only('index');

});