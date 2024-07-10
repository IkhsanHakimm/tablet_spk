<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SocialAuthController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);

Route::get('auth/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social.redirect');
Route::get('auth/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback']);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::prefix('criteria')->group(function () {
        Route::get('/', [CriteriaController::class, 'index'])->name('pages.criteria');
        Route::post('/store', [CriteriaController::class, 'store'])->name('criteria.store');
        Route::put('/update', [CriteriaController::class, 'update'])->name('criteria.update');
        Route::delete('/destroy', [CriteriaController::class, 'delete'])->name('criteria.destroy');
    });

    Route::prefix('alternatives')->group(function () {
        Route::get('/', [AlternativeController::class, 'index'])->name('pages.alternatives');   
        Route::post('/store', [AlternativeController::class, 'store'])->name('alternative.store');   
        Route::put('/update', [AlternativeController::class, 'update'])->name('alternative.update');   
        Route::delete('/destroy', [AlternativeController::class, 'delete'])->name('alternative.destroy');   
    });

    Route::prefix('grades')->group(function () {
        Route::get('/', [GradeController::class, 'index'])->name('pages.grades');   
        Route::get('/getForms', [GradeController::class, 'getForms'])->name('grades.getForms');   
        Route::put('/update', [GradeController::class, 'update'])->name('grades.update');   
    }); 

    Route::get('/calculations', [CalculationController::class, 'index'])->name('pages.calculation');    
    Route::get('/result', [ResultController::class, 'index'])->name('pages.result'); 
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
