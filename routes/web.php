<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\NoteController;


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



Route::get('/notes', [NoteController::class, 'index']);

Route::get('/graf', function () {
    return view('graf');
});

Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate.pdf');


Route::get("/editor", [EditorController::class, 'index'])->name('text.index');
Route::post('/editor', [EditorController::class, 'store'])->name('text.store');
Route::delete('/editoros/{id}', [EditorController::class, 'destroy'])->name('editoros.destroy');






Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
