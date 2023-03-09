<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\APIProductController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\CartController;

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

Route::get('/', [HomeController::class, 'welcome'])->name('inicio');
Route::post('/cart', [CartDetailController::class, 'store']);
Route::delete('/cart', [CartDetailController::class, 'destroy']);

Route::post('/order', [CartController::class, 'update']);




//Route::get('/home', 'HomeController@index')->name('inicio');


Route::middleware(['auth','verified','admin'])->group(function () {
    Route::get('/admin/products', [ProductController::class, 'index']);//listado
    Route::get('/admin/products/create', [ProductController::class, 'create']);//formulario
    Route::post('/admin/products', [ProductController::class, 'store']);//registrar
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit']);//Cargar formulario de edición
    Route::post('/admin/products/{id}/edit', [ProductController::class, 'update']);//actualizar datos producto
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy']);//eliminar producto



    Route::get('/admin/products/{id}/images', [ImageController::class, 'index']);//listado imagenes
    Route::post('/admin/products/{id}/images', [ImageController::class, 'store']);//registrar imagenes
    Route::delete('/admin/products/{id}/images', [ImageController::class, 'destroy']);//registrar imagenes
    Route::get('/admin/products/{id}/images/select/{image}', [ImageController::class, 'select']);//destacar imagenes

    Route::get('/admin/users', [UserController::class, 'index']);//listado
    Route::get('/admin/users/create', [UserController::class, 'create']);//formulario
    Route::post('/admin/users', [UserController::class, 'store']);//registrar
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit']);//Cargar formulario de edición
    Route::post('/admin/users/{id}/edit', [UserController::class, 'update']);//actualizar datos producto
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy']);//eliminar producto
    Route::get('/admin/users/{id}', [UserController::class, 'show']);//listado

    Route::get('/api/products', [APIProductController::class, 'index']);//listado
    Route::put('/api/actualizar', [APIProductController::class, 'update']);//listado
    Route::post('/api/guardar', [APIProductController::class, 'store']);//listado
    Route::delete('/api/borrar/{id}', [APIProductController::class, 'delete']);//listado



});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/admin/products/{id}', [ProductController::class, 'show']);//listado

});
require __DIR__.'/auth.php';
