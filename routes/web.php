<?php

use App\Http\Controllers\AMCListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'register_post']);
Route::post('login_post', [AuthController::class, 'login_post']);

Route::group(['middleware'=>'admin'],function(){
    Route::get('admin/dashboard', [DashboardController::class, 'admin_dashboard']);
    Route::get('admin/amc/list', [AMCListController::class, 'amc_list']);
    Route::get('admin/amc/add', [AMCListController::class, 'amc_add']);
    Route::post('admin/amc/add', [AMCListController::class, 'amc_store']);
    Route::get('admin/amc/edit/{id}', [AMCListController::class, 'amc_edit']);
    Route::post('admin/amc/edit/{id}', [AMCListController::class, 'amc_update']);
    Route::get('admin/amc/delete/{id}', [AMCListController::class, 'amc_delete']);

});
Route::group(['middleware'=>'user'],function(){
    Route::get('user/dashboard', [DashboardController::class, 'user_dashboard']);

});
Route::group(['middleware'=>'vendor'],function(){
    Route::get('vendor/dashboard', [DashboardController::class, 'vendor_dashboard']);

});
Route::get('logout', [AuthController::class, 'logout']);
