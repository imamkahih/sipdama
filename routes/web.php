<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get(
    '/dashboard',
    [MahasiswaController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/add', function () {
    return Inertia::render('Add');
})->middleware(['auth', 'verified'])->name('add');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->middleware(['auth', 'verified'])->name('create');
Route::get('/mahasiswa/detail', [MahasiswaController::class, 'show'])->middleware(['auth', 'verified'])->name('show');
Route::get('/mahasiswa/edit', [MahasiswaController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit');
Route::post('/mahasiswa/update', [MahasiswaController::class, 'update'])->middleware(['auth', 'verified'])->name('update');
Route::post('/mahasiswa/destroy', [MahasiswaController::class, 'destroy'])->middleware(['auth', 'verified'])->name('destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
