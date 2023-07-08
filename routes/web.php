<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use App\Models\Product;

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

Route::get('/', function () {
    $products = Product::with(['images' => function ($query) {
        $query->first();
    }])->where('status', 'active')->get();

    return view('welcome', compact('products'));
    
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $orders = Order::where('user_id', auth()->user()->id)->get();

       
        return view('dashboard', compact('orders'));
    })->name('dashboard');
});


Route::prefix('admin')->middleware(['auth','permission:access_dashboard'])->group(function () {
    // Rutas protegidas por los middlewares "auth" y "AdminMiddleware"


    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


    Route::resource('/roles', RoleController::class)->only([ 'index' ,'show' ])->middleware('permission:read_roles');
    Route::resource('/roles', RoleController::class)->only([ 'create','store'  ])->middleware('permission:create_roles');

    Route::resource('/products', ProductController::class)->only([ 'index' ,'show' ])->middleware('permission:read_products');
    Route::resource('/products', ProductController::class)->only([ 'create','store'  ])->middleware('permission:create_products');

    Route::resource('/users', UserController::class)->only([ 'index' ,'show' ])->middleware('permission:read_users');
    Route::resource('/users', UserController::class)->only([ 'create','store'  ])->middleware('permission:create_users');

    
   
    // Otras rutas de administración...
});

