<?php

//Auth
Auth::routes();

//Articles
Route::resource('/articles', 'ArticleController', ['except' => ['index', 'edit', 'show']]);
Route::prefix('articles')->as('articles.')->group(function(){
    Route::name('index')->get('/', 'ArticleController@index');
    Route::name('by.category')->get('categories/{category}', 'ArticleController@byCategory');
    Route::name('by.user')->get('users/{user}', 'ArticleController@byUser');
    Route::name('status')->patch('{article}/status', 'ArticleController@updateStatus');
    Route::name('show')->get('{category}/{article}', 'ArticleController@show');
    Route::name('edit')->get('{category}/{article}/edit', 'ArticleController@edit');
});

//File
Route::name('show.file')->get('/file/{article}', 'ArticleController@showFile');

//Home
Route::get('/home', 'HomeController@index');