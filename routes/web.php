<?php

use App\Http\Controllers\AMCListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\VendorTypeController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookServiceController;
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
Route::get('vendor/password/{token}', [VendorController::class, 'vendor_password']);
Route::post('vendor/password/{token}', [VendorController::class, 'vendor_password_post']);

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
    Route::get('admin/amc/edit_free_service/{id}', [AMCListController::class, 'amc_edit_free_service']);
    Route::post('admin/amc/edit_free_service/{id}', [AMCListController::class, 'amc_update_free_service']);
    Route::get('admin/amc/delete_free_service/{id}', [AMCListController::class, 'amc_delete_free_service']);


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

    //service_type
    Route::get('admin/service_type/list', [ServiceTypeController::class, 'service_type_list']);
    Route::get('admin/service_type/add', [ServiceTypeController::class, 'service_type_add']);
    Route::post('admin/service_type/add', [ServiceTypeController::class, 'service_type_store']);
    Route::get('admin/service_type/edit/{id}', [ServiceTypeController::class, 'service_type_edit']);
    Route::post('admin/service_type/edit/{id}', [ServiceTypeController::class, 'service_type_update']);
    Route::get('admin/service_type/delete/{id}', [ServiceTypeController::class, 'service_type_delete']);

    //subcategory list
    Route::get('admin/sub_category/list', [SubCategoryController::class, 'subcategory_list']);
    Route::get('admin/sub_category/add', [SubCategoryController::class, 'subcategory_add']);
    Route::post('admin/sub_category/add', [SubCategoryController::class, 'subcategory_insert']);
    Route::get('admin/sub_category/edit/{id}', [SubCategoryController::class, 'subcategory_edit']);
    Route::post('admin/sub_category/edit/{id}', [SubCategoryController::class, 'subcategory_update']);
    Route::get('admin/sub_category/delete/{id}', [SubCategoryController::class, 'subcategory_delete']);

    //vendor type  list
    Route::get('admin/vendor_type/list', [VendorTypeController::class, 'vendor_list']);
    Route::get('admin/vendor_type/add', [VendorTypeController::class, 'vendor_add']);
    Route::post('admin/vendor_type/add', [VendorTypeController::class, 'vendor_insert']);
    Route::get('admin/vendor_type/edit/{id}', [VendorTypeController::class, 'vendor_edit']);
    Route::post('admin/vendor_type/edit/{id}', [VendorTypeController::class, 'vendor_update']);
    Route::get('admin/vendor_type/delete/{id}', [VendorTypeController::class, 'vendor_delete']);


    Route::get('admin/vendor/list', [VendorController::class, 'VendorList']);
    Route::get('admin/vendor/add', [VendorController::class, 'VendorAdd']);
    Route::post('admin/vendor/add', [VendorController::class, 'VendorStore']);
    Route::get('admin/vendor/edit/{id}', [VendorController::class, 'VendorEdit']);
    Route::post('admin/vendor/edit/{id}', [VendorController::class, 'VendorUpdate']);

    Route::get('admin/user/list', [UserController::class, 'userList']);
    Route::get('admin/user/add', [UserController::class, 'userAdd']);
    Route::post('admin/user/add', [UserController::class, 'userStore']);
    Route::get('admin/user/edit/{id}', [UserController::class, 'userEdit']);
    Route::post('admin/user/edit/{id}', [UserController::class, 'userUpdate']);
    Route::get('admin/user/delete/{id}', [UserController::class, 'userDelete']);


});
Route::group(['middleware'=>'user'],function(){
    Route::get('user/dashboard', [DashboardController::class, 'user_dashboard']);
    Route::get('user/book_service/list', [BookServiceController::class, 'book_service_list']);
    Route::get('user/book_service/add', [BookServiceController::class, 'book_service_add']);
    Route::post('user/book_service/add', [BookServiceController::class, 'book_service_store']);
    Route::post('user/book_service/sub_category', [BookServiceController::class, 'sub_category_dropdown']);

});
Route::group(['middleware'=>'vendor'],function(){
    Route::get('vendor/dashboard', [DashboardController::class, 'vendor_dashboard']);

});
Route::get('logout', [AuthController::class, 'logout']);
