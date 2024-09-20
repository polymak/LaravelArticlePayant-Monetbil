<?php

use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'home'])->name('home');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/articles/{article}/pay', [ArticleController::class, 'pay'])->name('article.pay');
Route::post('/payment/notify', [ArticleController::class, 'handlePaymentNotification'])->name('payment.notify');
