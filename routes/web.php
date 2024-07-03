<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return redirect()->route('make.login');
});


Route::get ('/login', [LoginController::class,'login'])->name('make.login');
Route::get('/register', [LoginController::class,'register'])->name('make.register');

Route::get ('/logout', [LoginController::class,'logout'])->name('make.logout');
Route::post ('/authenticate', [LoginController::class,'authenticate'])->name('make.authenticate');
Route::post ('/process-register', [LoginController::class,'processRegister'])->name('make.processRegister');

Route::get('/dashboard', [DashboardController::class,'index'])->name('make.dashboard');

Route::post('/store', [DashboardController::class,'store'])->name('make.store');


Route::get('/showroom', [DashboardController::class, 'showroom'])->name('make.showroom');

Route::get('/newshowroom', [DashboardController::class,'newshowroom'])->name('make.newshowroom');

Route::get('/showroom/edit/{showroom}', [DashboardController::class, 'edit'])->name('edit');

Route::post('/showroom/update/{showroom}', [DashboardController::class, 'update'])->name('update');

Route::delete('/showroom/destroy/{showroom}',[DashboardController::class,'destroy'])->name('destroy');