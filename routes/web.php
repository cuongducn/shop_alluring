<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\NhaCCController;
use App\Http\Controllers\billbanController;
use App\Http\Controllers\billnhapController;
use App\Http\Controllers\cbillbanController;
use App\Http\Controllers\cbillnhapController;
use App\Http\Controllers\PhanhoiController;
use App\Http\Controllers\KhachhangController;
use App\Http\Controllers\SlideControllerr;
use App\Http\Controllers\AnhController;
use App\Http\Controllers\Admin\AdminController;



Route::get('/', function () {
    return view('User.pages.index');
});
Route::get('/detail/{id}', function () {
    return view('User.pages.detail');
});
Route::get('/Detail_product/{id}', function () {
    return view('Detail/Product_detail');
});
Route::get('/Cart', function () {
    return view('User.pages.Cart');
});

Route::get('/all_product', function () {
    return view('User.pages.products');
});
Route::get('/list_product/{id}', function () {
    return view('User.pages.products');
});
Route::get('/pro', function () {
    return view('Detail/Product_detail');
});

Route::get('/login', function () {
    return view('User.pages.login');
});
Route::get('/Tintuc', function () {
    return view('User.pages.new');
});
Route::get('/Tintuc/{id}', function () {
    return view('User.pages.new');
});
Route::get('/invoice', function () {
    return view('User.pages.invoice');
});

Route::get('/sanpham', [SanPhamController::class, 'Get']);
Route::get('/sanpham/{id}', [SanPhamController::class, 'show']);
Route::post('/sanpham/update/{id}', [SanPhamController::class, 'update']);
Route::get('/Detail_product/{id}', [SanPhamController::class, 'detail']);
Route::get('/lsp', [CategoriesController::class, 'getall']);
Route::get('/lsp/{id}', [CategoriesController::class, 'show']);
Route::post('/lsp/update/{id}', [CategoriesController::class, 'update']);
Route::get('/billban', [billbanController::class, 'Get']);
Route::get('/billnhap', [billnhapController::class, 'Get']);
Route::get('/cban', [cbillbanController::class, 'Get']);
Route::get('/cnhap', [cbillnhapController::class, 'Get']);
Route::get('/phanhois', [PhanhoiController::class, 'Get']);
Route::get('/khachs', [KhachhangController::class, 'Get']);
Route::get('/nhanvienn', [NhanvienController::class, 'Get']);
Route::get('/nhaccss', [NhaCCController::class, 'getall']);
Route::get('/users', [UserController::class, 'get']);
Route::get('/slides', [SlideControllerr::class, 'get']);
Route::get('/lsp/{id}', [CategoriesController::class, 'show']);


Route::prefix('admin')->group(function () {
    Route::get('', function () {
        return redirect(route('admin.dashboard'));
    });
    Route::get('dashboard', [AdminController::class, 'Product']);
    Route::get('products', [AdminController::class, 'Product']);
    Route::get('categories', [AdminController::class, 'Category']);
    Route::get('news', [AdminController::class, 'News']);
    Route::get('purchases', [AdminController::class, 'Purchase']);
    Route::get('sales', [AdminController::class, 'Sales']);
    Route::get('SaleDetail', [AdminController::class, 'SaleDetail']);
    Route::get('purchaseDetail', [AdminController::class, 'PurchaseDetail']);
    Route::get('feedback', [AdminController::class, 'Feedback']);
    Route::get('customers', [AdminController::class, 'Customers']);
    Route::get('suppliers', [AdminController::class, 'Suppliers']);
    Route::get('employees', [AdminController::class, 'Employees']);
    Route::get('slides', [AdminController::class, 'Slides']);
    Route::get('users', [AdminController::class, 'Users']);
    Route::get('statistical', [AdminController::class, 'Statistical']);
});
