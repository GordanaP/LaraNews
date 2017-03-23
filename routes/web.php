<?php

//Auth
Auth::routes();

//Articles
Route::name('articles.index')->get('/', 'ArticleController@index');
Route::resource('/articles', 'ArticleController', ['except' => ['index']]);
Route::prefix('articles')->as('articles.')->group(function(){
    Route::name('by.category')->get('/categories/{category}', 'ArticleController@byCategory');
    Route::name('by.user')->get('users/{user}', 'ArticleController@byUser');
    Route::name('status')->patch('/{article}/status', 'ArticleController@updateStatus');
});

//File
Route::name('show.file')->get('/file/{article}', 'ArticleController@showFile');

//Home
Route::get('/home', 'HomeController@index');