<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;


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

Route::get('/',[MyController::class, 'HomePage']);
// Route::get('/',[MyController::class, 'LoginPage']);
Route::get('/HomePage',[MyController::class, 'HomePage']);


//Data Connection= Users Table ============================================
Route::post('adduser',[MyController::class,'adduser']);
Route::post('edituser',[MyController::class,'edituser']);
Route::get('changeusersstatus/{c}',[MyController::class, 'changeusersstatus'])->name('changeusersstatus'); //Active Deactive Button
Route::get('deleteuser/{c}',[MyController::class,'deleteuser'])->name('deleteuser'); //{c} = Passing variable
//=========================================================================