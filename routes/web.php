<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\EditorController;
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

Route::get('/graf', function () {
    return view('graf');
});

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate.pdf');



Route::get('/editor', [EditorController::class, 'showEditor']);
Route::post('/editor/save', [EditorController::class, 'saveContent'])->name('editor.save');
