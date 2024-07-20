<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\PitanjeController;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/addSubject', function () {
    return view('addSubject');
})->middleware(['auth', 'verified'])->name('addSubject');

Route::get('/updateSubject/{id}/{name}', function ($id, $name) {
    return view('updateSubject',['id'=>$id, 'name'=>$name]);
})->middleware(['auth', 'verified'])->name('updateSubject');

Route::middleware('auth')->group(function () {
    Route::post('/predmetDodaj', [SubjectController::class, 'store'])->name('subject.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dodajPitanje', [PitanjeController::class, 'dodajPitanje'])->name('pitanje.dodaj');
});
Route::middleware('auth')->group(function () {
    Route::get('/generisiBlanket', [PitanjeController::class, 'generisiBlanket'])->name('pitanje.generisiBlanket');
});

//
//Route::get('/subjects', function () {
//    return view('subjects.subjects');
//})->middleware(['auth', 'verified'])->name('subjects');

Route::middleware('auth')->group(function () {
    Route::get('/subjects', [SubjectController::class, 'index'])->name('subject.index');
    Route::patch('/subjects/update/{oldId}', [SubjectController::class, 'update'])->name('subject.update');
    Route::get('/subjectsGetAll', [SubjectController::class, 'getAll'])->name('subject.getAll');
    Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
