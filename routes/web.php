<?php

use App\Http\Controllers\AMCListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
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
    Route::get('admin/amc/add_ons/{id}', [AMCListController::class, 'amc_add_ons_list']);
    Route::get('admin/amc/add_add_ons/{id}', [AMCListController::class, 'amc_add_add_ons']);
    Route::post('admin/amc/add_add_ons/{id}', [AMCListController::class, 'amc_store_add_ons']);
    Route::get('admin/amc/edit_add_ons/{id}', [AMCListController::class, 'amc_edit_add_ons']);
    Route::post('admin/amc/edit_add_ons/{id}', [AMCListController::class, 'amc_update_add_ons']);
    Route::get('admin/amc/delete_add_ons/{id}', [AMCListController::class, 'amc_delete_add_ons']);
    Route::get('admin/amc/free_services/{id}', [AMCListController::class, 'amc_free_services']);
    Route::get('admin/amc/add_free_service/{id}', [AMCListController::class, 'amc_add_free_service']);
    Route::post('admin/amc/add_free_service/{id}', [AMCListController::class, 'amc_create_free_service']);


    Route::get('admin/amc/edit/{id}', [AMCListController::class, 'amc_edit']);
    Route::post('admin/amc/edit/{id}', [AMCListController::class, 'amc_update']);
    Route::get('admin/amc/delete/{id}', [AMCListController::class, 'amc_delete']);

    //category
    Route::get('admin/category/list', [CategoryController::class, 'category_list']);
    Route::get('admin/category/add', [CategoryController::class, 'category_add']);
    Route::post('admin/category/add', [CategoryController::class, 'category_insert']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'category_edit']);
    Route::post('admin/category/edit/{id}', [CategoryController::class, 'category_update']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'category_delete']);


});
Route::group(['middleware'=>'user'],function(){
    Route::get('user/dashboard', [DashboardController::class, 'user_dashboard']);

});
Route::group(['middleware'=>'vendor'],function(){
    Route::get('vendor/dashboard', [DashboardController::class, 'vendor_dashboard']);

});
Route::get('logout', [AuthController::class, 'logout']);
