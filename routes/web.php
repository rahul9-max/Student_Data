<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoginController;
use App\Models\Customer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/customer/signin',function(){
//     return view('login');
// })->name('customer.signin');

// When you define a route using the Route::match() method, you can specify an array of HTTP methods that the route should respond to

Route::group(['middleware' => ['web']], function () {
Route::get('/customer',[StudentController::class,'student']);
Route::match(['get', 'post'], '/home', [StudentController::class, 'home'])->middleware('custom');
Route::get('/customer/view', [StudentController::class, 'view'])->middleware('custom');
Route::get('/customer/signin',[LoginController::class,'showLoginForm']);
Route::post('/customer/signin',[LoginController::class,'signin'])->name('customer.signin');
Route::post('/customer/logout',[LoginController::class,'logout'])->name('customer.logout');
Route::post('/customer',[StudentController::class,'store'])->name('customer.create');
Route::get('/customer/edit/{id}',[StudentController::class,'edit']);
Route::post('/customer/update/{id}',[StudentController::class,'update']);
Route::get('/customer/delete/{id}',[StudentController::class,'delete'])->name('customer.delete');
});


