<?php
use App\Http\Controllers\AdController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/ads/create', [AdController::class,'create'])->name('ads.create');

Route::get('/ads/{ad}', [AdController::class,'show'])->name('ads.show');

Route::get('/category/{category:name}/ads', [PublicController::class, 'adsByCategory'])->name('category.ads');

Route::get('/search',[PublicController::class,'search'])->name('search');
Route::get('/search_results',[PublicController::class,'ad.search_results'])->name('search_results');

Route::middleware(['isRevisor'])->group(function(){
    Route::get('/revisor',[RevisorController::class,'index'])->name(('revisor.home'));
    Route::patch('/revisor/ad/{ad}/accept',[RevisorController::class, 'acceptAd'])->name('revisor.ad.accept');
    Route::patch('/revisor/ad/{ad}/reject',[RevisorController::class, 'rejectAd'])->name('revisor.ad.reject');
    });

Route::get('revisor/become',[RevisorController::class,'becomeRevisor'])->middleware('auth')->name('revisor.become');
Route::get('revisor/{user}/make',[RevisorController::class,'makeRevisor'])->middleware('auth')->name('revisor.make');

Route::post('/locale/{locale}', [PublicController::class, 'setLocale'])->name('locale.set');