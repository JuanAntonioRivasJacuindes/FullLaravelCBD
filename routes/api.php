<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\RoutePath;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

$limiter = config('fortify.limiters.login');

Route::post(RoutePath::for('login', '/login'), [AuthenticatedSessionController::class, 'store'])
    ->middleware(array_filter([
        'guest:web',
        $limiter ? 'throttle:' . $limiter : null,
    ]));
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('/products', ProductController::class)->only(['show']);
Route::prefix('admin')->middleware(['auth:sanctum', 'permission:access_dashboard'])->group(function () {
    // Rutas protegidas por los middlewares "auth" y "AdminMiddleware"


    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


    Route::resource('/roles', RoleController::class)->only(['index', 'show'])->middleware('permission:read_roles');
    Route::resource('/roles', RoleController::class)->only(['create', 'store'])->middleware('permission:create_roles');

    Route::resource('/products', ProductController::class)->only(['index', 'show'])->middleware('permission:read_products');
    Route::resource('/products', ProductController::class)->only(['create', 'store'])->middleware('permission:create_products');

    Route::resource('/users', UserController::class)->only(['index', 'show'])->middleware('permission:read_users');
    Route::resource('/users', UserController::class)->only(['create', 'store'])->middleware('permission:create_users');
    Route::resource('/users', UserController::class)->only([
        'edit',
        'update'
    ])->middleware('permission:update_users');
    Route::resource('/users', UserController::class)->only([
        'destroy'
    ])->middleware('permission:delete_users');

    Route::resource('/categories', CategoryController::class)->only(['index', 'show'])->middleware('permission:read_categories');
    Route::resource('/categories', CategoryController::class)->only(['create', 'store'])->middleware('permission:create_categories');


    Route::get('/permissions', [PermissionController::class, 'index']);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'assignPermissions']);
    // Otras rutas de administración...
});
