<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\API\RegisterController;
//use App\Http\Controllers\API\ProductController;

use App\Http\Controllers\API\RegisterationController;
use App\Http\Controllers\API\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::post('register', [RegisterController::class, 'register']);
//Route::post('login', [RegisterController::class, 'login']);
     
//  Route::middleware('auth:api')->group( function () {

// Route::post('products', [ProductController::class, 'index']);
    
 //Route::resource('products', ProductController::class);
// });

Route::post('registeration',[RegisterationController::class,'registeration']);
Route::post('login',[RegisterationController::class,'login']);

Route::resource('students',StudentController::class);
