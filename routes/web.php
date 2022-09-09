<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
  
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/mydashboard', function () {
    return view('layouts._app');
})->middleware(['auth'])->name('login.user');

// Route::get('/homePage', function () {
//     return view('layouts._app');
// })->name('home.user');

// Route::get('/homePage', [LoginController::class, 'login'])->name('login');
// Route::get('/homePage', [LoginController::class, 'handleLogin'])->name('login.user');


require __DIR__.'/auth.php';
