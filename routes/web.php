<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Rutas protegidas por los middlewares "auth" y "AdminMiddleware"


    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');

    Route::get('/', function () {
        return view('admin.dashboard');
   
    })->name('admin.dashboard');
    Route::get('/roles', function () {
        return view('admin.roles');
   
    })->name('admin.roles');

    // Otras rutas de administración...
});

