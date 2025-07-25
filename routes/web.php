<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProdukController;

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

Route::pattern('id', '[0-9]+');

Route::get('/', function () {
    return redirect()->route('page');
});

//Route Landing Page
Route::get('page', [HomeController::class, 'index'])->name('page');
Route::get('/collection', [HomeController::class, 'collection'])->name('collection');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/produk/{id}', [HomeController::class, 'show_produk'])->name('produk.show');


//Route Login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [WelcomeController::class, 'index']);

    Route::group(['prefix' => 'produk'], function () {
        Route::get('/', [ProdukController::class, 'index']);
        Route::get('/create_ajax', [ProdukController::class, 'create_ajax']);
        Route::post('/ajax', [ProdukController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax', [ProdukController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [ProdukController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [ProdukController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [ProdukController::class, 'delete_ajax']);
    });    
});