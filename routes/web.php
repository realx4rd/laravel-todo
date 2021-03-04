<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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
Route::get('/',[TodoController::class,'index']);
Route::resource('/todo',TodoController::class);
Route::post('todo/destory/bulk',[TodoController::class,'bulkDestroy'])->name('todo.destroy.bulk');
Route::post('todo/edit/bulk',[TodoController::class,'bulkEdit'])->name('todo.edit.bulk');
Route::put('todo/edit/bulk',[TodoController::class,'bulkUpdate'])->name('todo.edit.bulk.submit');