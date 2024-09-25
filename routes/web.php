<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EskulController;
use App\Http\Controllers\SiswaController;

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
    return view('pages.auth.login');
});


Route::middleware([
    'auth',
])->group(function () {
    Route::get('home', [UserController::class, 'index'])->name('home');
    Route::resource('user', UserController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('eskul', EskulController::class);


    Route::get('list', [ListController::class, 'index'])->name('list.index');
    Route::get('list/create', [ListController::class, 'create'])->name('list.create');
    Route::post('list', [ListController::class, 'store'])->name('list.store');
    Route::get('list/{siswa_id}/{eskul_id}/edit', [ListController::class, 'edit'])->name('list.edit');
    Route::put('list/{siswa_id}/{eskul_id}', [ListController::class, 'update'])->name('list.update');
    Route::delete('list/{siswa_id}/{eskul_id}', [ListController::class, 'destroy'])->name('list.destroy');
});
