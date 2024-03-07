<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordController;

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
    return view('panduan');
});

Route::get('Login/index', function () {
    return view('Login.index');
});

Route::get('main', function () {
    return view('layouts.main');
});

Route::post('form', [FormController::class, 'index'])->name('form.index');

// Route::controller(FormController::class)->group(function(){
//     Route::get('/','index');

//     Route::post('post','store');
// });

// Route::get('selamat', function () {
//     return view('selamat');
// });
// Route::get('/form/{page}', [FormController::class, 'showForm']);
// Route::post('/form', [FormController::class, 'submitForm']);
