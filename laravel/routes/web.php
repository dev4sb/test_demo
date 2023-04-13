<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

Route::get('/employees', [EmployeeController::class, 'index'])->name('index');
Route::get('/empCreate', [EmployeeController::class, 'create'])->name('create');
Route::post('/empStore', [EmployeeController::class, 'store'])->name('store');
Route::get('/empEdit/{id}', [EmployeeController::class,'edit']);
Route::put('empUpdate/{id}', [EmployeeController::class, 'update']);

Route::delete('/empDelete/{id}',[EmployeeController::class,'destroy'])->name('delete');