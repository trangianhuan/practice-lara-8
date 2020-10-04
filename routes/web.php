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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/ranking', function () {
    return view('ranking');
})->name('ranking');

Route::get('/404', function () {
    return view('errors.404');
})->name('404');

Route::middleware(['admin', 'auth:sanctum', 'verified'])->group(function () {
    Route::get('/questions', function () {
        return view('question');
    })->name('question');

    Route::get('/questions/create', function () {
        return view('question-create');
    })->name('question.create');

    Route::get('/questions/{id}/edit', function ($id) {
        return view('question-create', ['id' => $id]);
    })->name('question.edit');

    Route::get('/options/question', function () {
        return view('option-question');
    })->name('options.question');

    Route::get('/options/question/create', function () {
        return view('option-question-create');
    })->name('options.question.create');

    Route::get('/options/question/{id}/edit', function ($id) {
        return view('option-question-create', ['id' => $id]);
    })->name('options.question.edit');
});
