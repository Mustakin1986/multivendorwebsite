<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\frontend\FrontendController;

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
/*Route::get('/',function(){
    return view('welcome');
});*/

Route::get('/', [FrontendController::class,'index']);

// Admin controller Route
Route::get('/admin/login',[AdminController::class,'adminloginForm']);
Route::post('/admin/login',[AdminController::class,'adminlogin']);
Route::get('/admin/dashboard',[AdminController::class,'adminDashboard']);

//Category controller
Route::get('/category/create',[CategoryController::class,'categorycreate']);
Route::post('/store/category',[CategoryController::class,'storeCategory']);
Route::get('/category/manage',[CategoryController::class,'categoryManage']);
Route::get('/category/delete/{id}',[CategoryController::class,'categoryDelete']);
Route::get('/category/edit/{id}',[CategoryController::class,'categoryEdit']);
Route::post('/category/update/{id}',[CategoryController::class,'categoryUpdate']);

// Color Controller
Route::get('/color/addcolor',[ColorController::class,'add_color']);
Route::post('/store/color',[ColorController::class,'store_color']);
