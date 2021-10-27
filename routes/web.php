<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\EmployeeController;

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


Route::resource('/employee', EmployeeController::class);

Route::get('/designation', [EmployeeController::class, 'designation'])->name('designation');

Route::post('/designationsave', [EmployeeController::class, 'designationsave'])->name('designationsave');

Route::get('/delete/{id}', [EmployeeController::class, 'destroy'])->name('destroy');
