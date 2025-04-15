<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('user')->middleware('auth', 'role:Headmaster|Teacher')->group(function () {
    Route::get('/all', [UserController::class, 'all'])->name('user.all');
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});
Route::prefix('task')->middleware('auth', 'role:Headmaster|Teacher')->group(function () {
    Route::get('/all', [TaskController::class, 'index'])->name('task.all');
    Route::get('/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/store', [TaskController::class, 'store'])->name('task.store');
    Route::get('/destroy/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
});
Route::prefix('task')->middleware('auth', 'role:Teacher|Student')->group(function () {
    Route::get('/receive', [TaskController::class, 'show'])->name('task.receive');
});

require __DIR__ . '/auth.php';
