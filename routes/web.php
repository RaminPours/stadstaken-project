<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $issues = auth()->user()->issues();

    return view('dashboard', [
        'recentIssues' => (clone $issues)->latest()->take(3)->get(),
        'totalIssues' => (clone $issues)->count(),
        'openIssues' => (clone $issues)->where('status', 'open')->count(),
        'completedIssues' => (clone $issues)->where('status', 'verwerkt')->count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// met middleware auth kunnen we de routes alleen toegankelijk maken voor ingelogde gebruikers
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // met resource route kunnen we alle routes voor de IssueController genereren, zoals index, create, store, show, edit, update en destroy
    Route::resource('issues', IssueController::class);
});

require __DIR__.'/auth.php';
