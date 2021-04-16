<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;


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
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/home',[ToDoController::class,'hello'])->name('center');

Route::get('/hoe', function () {
    return view('hoe',['text'=>'welcome']);
    
});
Route::post('/store',[ToDoController::class,'store'])->name('store');
Route::get('/edit/{todo}',[ToDoController::class,'edit'])->name('edit');
Route::post('/update/{todo}',[ToDoController::class,'update'])->name('update');
Route::post('/delete/{todo}',[ToDoController::class,'delete'])->name('delete');