<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AdminController as ControllersAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\lmao;
use App\Models\Customer;

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
Route::get('list',[ProductController::class, 'index']);
Route::get('add',[ProductController::class, 'add']);
Route::post('save',[ProductController::class, 'save']);
Route::get('edit/{id}',[ProductController::class, 'edit']);
Route::post('update',[ProductController::class, 'update']);
Route::get('delete/{id}',[ProductController::class, 'delete']);

Route::get('/login', [CustomerController::class,'login']);
Route::post('/loginCustomer', [CustomerController::class,'loginCustomer']);

Route::get('/registeration', [CustomerController::class,'registeration']);
Route::post('/saveCustomer', [CustomerController::class,'saveCustomer']);
Route::get('/', [CustomerController::class,'home']);
Route::get('/logout', [CustomerController::class,'logout']);

Route::get('/adminLogin', [ControllersAdminController::class,'adminLogin']);
Route::get('/dashboard', [ControllersAdminController::class,'dashboard'])->middleware('isLoggedIn');
Route::post('/loginAdmin', [ControllersAdminController::class,'loginAdmin']);
Route::get('table',[ControllersAdminController::class, 'table'])->middleware('isLoggedIn');