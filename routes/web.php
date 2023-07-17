<?php

use App\Http\Livewire\Laporan;
use App\Http\Livewire\UserHome;
use App\Http\Livewire\Manajuser;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('realisasipembangunans', 'livewire.realisasipembangunans.index')->middleware('auth');
	Route::view('penilaianmasyarakats', 'livewire.penilaianmasyarakats.index')->middleware('auth');
	Route::view('penilaians', 'livewire.penilaians.index')->middleware('auth');
	Route::view('kategoripenilaians', 'livewire.kategoripenilaians.index')->middleware('auth');
	Route::view('pembangunans', 'livewire.pembangunans.index')->middleware('auth');
	Route::view('jenispembangunans', 'livewire.jenispembangunans.index')->middleware('auth');
	Route::view('jenis-pembangunans', 'livewire.jenis-pembangunans.index')->middleware('auth');
	Route::view('masyarakats', 'livewire.masyarakats.index')->middleware('auth');
    Route::get('/manajuser', Manajuser::class)->middleware('auth');
    Route::get('/', UserHome::class);
    Route::get('/laporan', Laporan::class)->middleware('auth');
