<?php

use Illuminate\Support\Facades\App;
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

//Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bonjour/{prenom}/{nom}/{numero?}', function($prenom, $nom, $numero=1){
    return [$prenom, $nom];
})->where('numero', '[0-9]+')->name('bonjour');

Route::get('/hello/{prenom}/{nom}/{numero}', [\App\Http\Controllers\HelloController::class,'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::resource('animals', \App\Http\Controllers\AnimalController::class)
    ->except('show');
    /*
    Route::resources([
        'animals' => \App\Http\Controllers\AnimalController::class,
        'species' => \App\Http\Controllers\SpecieController::class
    ]);*/
});

Route::middleware(['isAdmin'])->group(function (){
    Route::get('/test', function(){
        return 'test';
    });
});

Route::get('/forbidden', function(){
    abort(403);
})->name('forbidden');

Route::get('/php', function(){
    return phpinfo();
});

Route::get('lang', function (){
    $locale = App::getLocale() === 'fr' ? 'en' : 'fr';
    session(['locale' => $locale]);
    return redirect()->back();
})->name('lang');
