<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/practice-areas', [PageController::class, 'practiceIndex'])->name('practice.index');
Route::get('/practice-areas/{slug}', [PageController::class, 'practiceShow'])->name('practice.show');
Route::get('/partners', [PageController::class, 'partnersIndex'])->name('partners.index');
Route::get('/partners/{slug}', [PageController::class, 'partnerShow'])->name('partners.show');
Route::get('/experiences', [PageController::class, 'experiencesIndex'])->name('experiences.index');
Route::get('/experiences/{id}', [PageController::class, 'experienceShow'])->name('experiences.show');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

