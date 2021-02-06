<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Position;
use App\Http\Livewire\Positions;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome')->name('home');


Route::get('/', Home::class)->name('home');
// Route::get('/positions', Positions::class)->name('positions');
Route::get('/{slug}', Position::class)->name('position');
