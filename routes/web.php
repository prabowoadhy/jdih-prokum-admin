<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProkumController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Mobile\ProkumAppController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Admin\KategoriController;
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
    return view('mobile.home');
})->name('welcome');

Route::get('/prokum', [ProkumAppController::class, 'index'])->name('prokum');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function(){
    Route::resource('dashboard/konfigurasi/roles', RoleController::class);
});

Route::middleware('auth')->controller(ProkumController::class)->group(function(){
    Route::get('/dashboard/prokum', 'index')->name('prokum-admin');
    Route::get('/dashboard/prokum/create', 'create')->name('create.prokum');
    Route::post('/dashboard/prokum/store', 'store')->name('store.prokum');
    Route::get('/dashboard/prokum/edit/{id}', 'edit')->name('edit.prokum');
    Route::post('/dashboard/prokum/update/{id}', 'update')->name('update.prokum');
    Route::get('/dashboard/prokum/delete/{id}', 'destroy')->name('delete.prokum');
});

Route::controller(KategoriController::class)->group(function(){
    Route::get('/dashboard/kategori-prokum', 'index')->name('kategori-admin');
    Route::get('/dashboard/kategori-prokum/create', 'create')->name('create.kategori');
    Route::post('/dashboard/kategori-prokum/store', 'store')->name('store.kategori');
    Route::get('/dashboard/kategori-prokum/edit/{id}', 'edit')->name('edit.kategori');
    Route::post('/dashboard/kategori-prokum/update/{id}', 'update')->name('update.kategori');
    Route::get('/dashboard/kategori-prokum/delete/{id}', 'destroy')->name('delete.kategori');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/dashboard/konfigurasi/user', 'index')->name('user.index');
    Route::get('/dashboard/konfigurasi/user/create', 'create')->name('create.user');
    Route::post('/dashboard/konfigurasi/user/store', 'store')->name('store.user');
    Route::get('/dashboard/konfigurasi/user/edit/{id}', 'edit')->name('edit.user');
    Route::post('/dashboard/konfigurasi/user/update/{id}', 'update')->name('update.user');
    Route::get('/dashboard/konfigurasi/user/delete/{id}', 'destroy')->name('delete.user');
});