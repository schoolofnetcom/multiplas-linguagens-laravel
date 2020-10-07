<?php

use Carbon\Carbon;
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
        return abort(400);
    }

    App::setLocale($locale);

    echo '<p>';
    echo App::getLocale();
    echo '</p>';

    if(App::isLocale('en')) {
        echo '<p>';
        echo 'Estamos no ambiente inglês';
        echo '</p>';
    }

    echo __('auth.throttle');
});

Route::get('home/{locale?}', function($locale = 'pt'){
    $languages = ['en', 'pt'];

    if(! in_array($locale, $languages)) {
        return abort(400);
    }

    App::setLocale($locale);

    echo '<p>';
    echo __('home.header.title');
    echo '</p>';

    echo '<p>';
    echo __('home.header.subtitle');
    echo '</p>';

    echo '<p>';
    echo __('home.main');
    echo '</p>';

    echo '<p>';
    echo __('home.footer');
    echo '</p>';
});

Route::get('string_as_key/{locale?}', function($locale = 'pt'){
    $languages = ['en', 'pt'];

    if(! in_array($locale, $languages)) {
        return abort(400);
    }

    App::setLocale($locale);

    echo '<p>';
    echo __('I love programming.');
    echo '</p>';
});

Route::get('replace/{name}/{locale?}', function($name, $locale = 'pt'){
    $languages = ['en', 'pt'];

    if(! in_array($locale, $languages)) {
        return abort(400);
    }

    App::setLocale($locale);

    echo '<p>';
    echo __('replace.welcome', ['name' => $name]);
    echo '</p>';

    $day = Carbon::now();

    echo '<p>';
    echo __('replace.today', ['day' => $day->day]);
    echo '</p>';
});
