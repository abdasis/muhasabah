<?php

use App\Http\Livewire\Contact\Create;
use App\Http\Livewire\Contact\Edit;
use App\Http\Livewire\Contact\Index;
use App\Http\Livewire\Contact\Show;
use App\Http\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::group(['prefix' => 'contact'], function (){
        Route::get('/', Index::class)->name('contact.index');
        Route::get('/create', Create::class)->name('contact.create');
        Route::get('/{id}/edit', Edit::class)->name('contact.edit');
        Route::get('/{id}/show', Show::class)->name('contact.show');
    });
});
