<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Position;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome')->name('home');


Route::get('/', Home::class)->name('home');
Route::get('/p/{slug}', Position::class)->name('position');
