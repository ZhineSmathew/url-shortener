<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrlshortController;
use Illuminate\Support\Facades\Route;
use App\Models\UrlShort;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    $count = UrlShort::count();
    return view('dashboard',compact('count'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('Urlshortener', UrlshortController::class);
Route::get('/newurl',[UrlshortController::class,'create']);
Route::post('/store',[UrlshortController::class,'store']);
Route::get('{shortlinks}',[UrlshortController::class,'shortlink']);


