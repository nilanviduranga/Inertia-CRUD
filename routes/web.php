<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('/admin_dashboard',[HomeController::class,'index'])->name('dashboard');
Route::get('addNew',[HomeController::class,'addNew'])->name('addNew');

Route::get('/{task_id}/updateView',[HomeController::class,'updateView'])->name('student.updateView');

Route::Post('/store',[HomeController::class,'store'])->name('student.store');
Route::Post('/{task_id}/delete',[HomeController::class,'delete'])->name('student.delete');
Route::Post('/update',[HomeController::class,'update'])->name('student.update');

Route::Post('/{task_id}/setActive',[HomeController::class,'setActive'])->name('student.setActive');
Route::Post('/{task_id}/setInactive',[HomeController::class,'setInactive'])->name('student.setInactive');


Route::get('/student',[StudentController::class,'index'])->name('ViewPage');

Route::get('/',[StudentController::class,'index'])->name('activeStudent');

require __DIR__.'/auth.php';


