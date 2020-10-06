<?php

use Illuminate\Support\Facades\App;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('test/language/{locale?}', function($locale = 'pt'){
    $languages = ['en', 'pt'];

    if(! in_array($locale, $languages)) {
        abort(400);
    }

    App::setLocale($locale);

    echo __('auth.failed');

    // BLADE
    // {{ __('auth.failed') }}

    // App::getLocale()
    // App::setLocale()
    // App::isLocale('en')

    if(App::isLocale('en')) {
        echo '<p>';
        echo 'estamos em inglês';
        echo '</p>';
    }
});
