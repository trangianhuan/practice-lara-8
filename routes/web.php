<?php

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

Route::resource('article', 'App\Http\Controllers\ArticleController');
Route::get('broadcast', function(){
    return view('layouts.broadcast.index');
});

Route::get('broadcast/send', function(){
    \Log::debug('test push');
    event(new \App\Events\TestPushEvent());
    return view('layouts.broadcast.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
