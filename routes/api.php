<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\JwtMiddleware;

/**
 * Authentication routes
 */

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
});

/**
 * Journals routes
 */

Route::get("journals", 'App\Http\Controllers\JournalsController@getAllJournals')->middleware(JwtMiddleware::class);
Route::get("journals/{id}", 'App\Http\Controllers\JournalsController@getJournalByID')->middleware(JwtMiddleware::class);
Route::post("journal/insert", 'App\Http\Controllers\JournalsController@insertJournal')->middleware(JwtMiddleware::class);
Route::delete("journal/{journalid}/delete", 'App\Http\Controllers\JournalsController@deleteJournal')->middleware(JwtMiddleware::class);

/**
 * categories routes
 */

 Route::get("categories", 'App\Http\Controllers\CategoriesController@getAllCategories')->middleware(JwtMiddleware::class);
 Route::get("category/{id}", 'App\Http\Controllers\CategoriesController@getCategoryByID')->middleware(JwtMiddleware::class);
 Route::post("category/insert", 'App\Http\Controllers\CategoriesController@insertCategory')->middleware(JwtMiddleware::class);
 Route::delete("category/{journalid}/delete", 'App\Http\Controllers\CategoriesController@deleteCategory')->middleware(JwtMiddleware::class);

 /**
 * pages routes
 */

 Route::get("pages", 'App\Http\Controllers\PagesController@getAllPages')->middleware(JwtMiddleware::class);
 Route::get("page/{id}", 'App\Http\Controllers\PagesController@getPageByID')->middleware(JwtMiddleware::class);
 Route::post("page/insert", 'App\Http\Controllers\PagesController@insertPage')->middleware(JwtMiddleware::class);
 Route::delete("page/{journalid}/delete", 'App\Http\Controllers\PagesController@deletePage')->middleware(JwtMiddleware::class);
