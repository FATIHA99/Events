<?php

use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard/{id}', [EventController::class, 'show'])->name('events.show');
        Route::get('/dashboard', [EventController::class, 'allEvents'])->name('dashboard');
        Route::get('/events/filter', [EventController::class, 'filteredEvents'])->name('events.filter');
        Route::post('/events/{event}/rsvp', [EventController::class, 'rsvp'])
            ->middleware('auth')
            ->name('events.rsvp');

    // Admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [EventController::class, 'index'])->name('admin.index');
        Route::get('/admin/events/create', [EventController::class, 'create'])->name('admin.create');
        Route::post('/admin/events', [EventController::class, 'store'])->name('admin.store');
        Route::get('/admin/events/{id}/edit', [EventController::class, 'edit'])->name('admin.edit');
        Route::put('/admin/events/{id}', [EventController::class, 'update'])->name('admin.update');
        Route::delete('/admin/events/{id}', [EventController::class, 'destroy'])->name('admin.destroy');

    });
});


require __DIR__ . '/auth.php';
