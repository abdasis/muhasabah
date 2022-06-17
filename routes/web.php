<?php

use App\Http\Livewire\ChartOfAccount\Create as CreateChartOfAccount;
use App\Http\Livewire\ChartOfAccount\Edit as EditChartOfAccount;
use App\Http\Livewire\ChartOfAccount\Index as IndexChartOfAccount;
use App\Http\Livewire\ChartOfAccount\Show as ShowChartOfAccount;
use App\Http\Livewire\Contact\Create;
use App\Http\Livewire\Contact\Edit;
use App\Http\Livewire\Contact\Index;
use App\Http\Livewire\Contact\Show;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Product\Create as CreateProduct;
use App\Http\Livewire\Product\Edit as EditProduct;
use App\Http\Livewire\Product\Index as IndexProduct;
use App\Http\Livewire\Product\Show as ShowProduct;
use Illuminate\Support\Facades\Route;

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
        Route::get('/{contact}/edit', Edit::class)->name('contact.edit');
        Route::get('/{contact}/show', Show::class)->name('contact.show');
    });

    //route untuk chart of account
    Route::group(['prefix' => 'chart-of-account'], function (){
        Route::get('/', IndexChartOfAccount::class)->name('chart-of-account.index');
        Route::get('/create', CreateChartOfAccount::class)->name('chart-of-account.create');
        Route::get('/{account}/edit', EditChartOfAccount::class)->name('chart-of-account.edit');
        Route::get('/{account}/show', ShowChartOfAccount::class)->name('chart-of-account.show');
    });

    //route untuk produk
    Route::group(['prefix' => 'product'], function (){
        Route::get('/', IndexProduct::class)->name('products.index');
        Route::get('/create', CreateProduct::class)->name('products.create');
        Route::get('/{product}/edit', EditProduct::class)->name('products.edit');
        Route::get('/{product}/show', ShowProduct::class)->name('products.show');
    });
});
