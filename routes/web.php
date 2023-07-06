<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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
    $data = [
        'john', 'doe'
    ];
    return view('welcome')->with('data', json_encode($data));
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
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

