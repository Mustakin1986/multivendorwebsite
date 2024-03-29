<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminVendorController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\subcategoryController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\Frontend\vendorController;

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

//user controller
Route::get('/user/login',[FrontendController::class,'userLogin']);
Route::get('/user/register',[FrontendController::class,'userRegister']);

//Vendor Controller
Route::get('/vendor/register', [vendorController::class,'vendorRegister']);
Route::post('/vendor/registration', [vendorController::class,'vendorRegistration']);
Route::post('/vendor/login', [vendorController::class,'vendorLogin']);
Route::get('/vendor/logout', [vendorController::class,'vendorLogout']);
Route::get('/vendor/dashboard', [vendorController::class,'vendorDashboard']);
Route::get('/vendor/product/create', [vendorController::class,'vendorProductCreateForm']);
Route::post('/vendor/product/store', [vendorController::class,'vendorProductStore']);



// Admin controller Route
Route::get('/admin/login',[AdminController::class,'adminloginForm']);
Route::post('/admin/login',[AdminController::class,'adminlogin']);
Route::get('/admin/dashboard',[AdminController::class,'adminDashboard']);
Route::get('/admin/logout',[AdminController::class,'adminLogout']);

//Category controller
Route::get('/category/create',[CategoryController::class,'categorycreate']);
Route::post('/store/category',[CategoryController::class,'storeCategory']);
Route::get('/category/manage',[CategoryController::class,'categoryManage']);
Route::get('/category/delete/{id}',[CategoryController::class,'categoryDelete']);
Route::get('/category/edit/{id}',[CategoryController::class,'categoryEdit']);
Route::post('/category/update/{id}',[CategoryController::class,'categoryUpdate']);

//sub Category Controller
Route::get('/subcategory/create',[SubcategoryController::class,'subcategoryCreate']);
Route::post('/subcategory/store',[SubcategoryController::class,'subcategoryStore']);
Route::get('/subcategory/Manage',[SubcategoryController::class,'subcategoryManage']);
Route::get('/subcategory/edit/{id}',[SubcategoryController::class,'subcategoryEdit']);
Route::get('/subcategory/delete/{id}',[SubcategoryController::class,'subcategoryDelete']);
Route::post('/subcategory/update/{id}',[SubcategoryController::class,'subcategoryUpdate']);

// add brand
Route::get('/add/brand',[BrandController::class,'addBrand']);
Route::post('/brand/store',[BrandController::class,'brandStore']);
Route::get('/manage/brand',[BrandController::class,'manageBrand']);
Route::get('/brand/delete/{id}',[BrandController::class,'brandDelete']);
Route::get('/brand/edit/{id}',[BrandController::class,'brandEdit']);
Route::post('/brand/update/{id}',[BrandController::class,'brandUpdate']);

// Color Controller
Route::get('/color/addcolor',[ColorController::class,'addColor']);
Route::post('/store/color',[ColorController::class,'colorStore']);
Route::get('/color/manage',[ColorController::class,'colorManage']);
Route::get('/color/delete/{id}',[ColorController::class,'colorDelete']);
Route::get('/color/edit/{id}',[ColorController::class,'colorEdit']);
Route::post('/color/update/{id}',[ColorController::class,'colorUpdate']);

//size
Route::get('/size/add_size',[SizeController::class,'addSize']);
Route::post('/store/size',[SizeController::class,'sizeStore']);
Route::get('/size/manage',[SizeController::class,'sizeManage']);
Route::get('/size/delete/{id}',[SizeController::class,'sizeDelete']);

//Admin vendors
Route::get('/vendors',[AdminVendorController::class,'vendors']);
Route::get('/admin/vendor/approved/{id}',[AdminVendorController::class,'vendorApproved']);
Route::get('/admin/vendor/pending/{id}',[AdminVendorController::class,'vendorPending']);
Route::get('/vendor/products',[AdminVendorController::class,'vendorProducts']);
Route::get('/vendor/product/approved/{id}',[AdminVendorController::class,'productApproved']);
Route::get('/vendor/product/pending/{id}',[AdminVendorController::class,'productPending']);
Route::get('/vendor/product/delete/{id}',[AdminVendorController::class,'productDelete']);

// Product Type
Route::get('/product/type',[ProductTypeController::Class,'ProductType']);
Route::post('/store/productType',[ProductTypeController::Class,'ProductTypeAdd']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
