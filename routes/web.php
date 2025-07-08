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
require_once "admin.php";

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [\App\Http\Controllers\Site\HomeController::class, 'index'])->name('site.index');
Route::get('/sube-{id}', [\App\Http\Controllers\Site\HomeController::class, 'branchSelect'])->name('site.branches.select');
Route::get('/kategori-{id}', [\App\Http\Controllers\Site\HomeController::class, 'categorySelect'])->name('site.category.select');
