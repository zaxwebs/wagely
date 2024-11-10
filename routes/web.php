<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('reports/create', 'reports.create')
    ->middleware(['auth', 'verified'])
    ->name('reports.create');

require __DIR__.'/auth.php';
