<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\PanduanController;
use App\Models\Panduan;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('word', function () {
//     return view('word');
// });

// Route::post('word', [WordController::class, 'index'])->name('word.index');

Route::get('form', function () {
    return view('form');
});

Route::get('panduan', function () {
    return view('panduan', [
        'panduan' => Panduan::all()
    ]);
});

// Route::get('Login/index', function () {
//     return view('Login.index');
// });

Route::get('main', function () {
    return view('layouts.main');
});

Route::post('form', [FormController::class, 'index'])->name('form.index');

Route::get('/', function () {
    return view('admin.home');
})->middleware('auth');

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');

// Register
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/upload', [PanduanController::class, 'upload']);
Route::post('/upload/proses', [PanduanController::class, 'proses_upload'])->name('upload.panduan');

// Route::controller(FormController::class)->group(function(){
//     Route::get('/','index');

//     Route::post('post','store');
// });

// Route::get('selamat', function () {
//     return view('selamat');
// });
// Route::get('/form/{page}', [FormController::class, 'showForm']);
// Route::post('/form', [FormController::class, 'submitForm']);
