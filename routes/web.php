<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\NotHiringYet;
use App\Http\Livewire\Position;
use App\Http\Livewire\Positions;
use Illuminate\Support\Facades\Route;


Route::get('/not-hiring-yet', NotHiringYet::class)->name('not.hiring');

Route::middleware(['hiring'])->group(function () {
    Route::get('/', Home::class)->name('home');
    Route::get('/{slug}', Position::class)->name('position');
});
