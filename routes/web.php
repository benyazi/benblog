<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'Post\ListController@index');
Route::get('/post/add', 'Post\AddController@index')->name('post.add');
Route::get('/post/edit/{id}', 'Post\AddController@edit')->name('post.edit');
Route::post('/post/save/new', 'Post\AddController@save')->name('post.save.new');
Route::post('/post/save/{id}', 'Post\AddController@save')->name('post.save');
Route::get('/p/{slug}', 'Post\ViewController@index')->name('post.view')->middleware(\App\Http\Middleware\CheckPost::class);
Route::get('/t/{slug}', 'TagController@view')->name('tag.view');
Route::get('/tags', 'TagController@index')->name('tag.list');

Auth::routes();
Route::get('/home', 'HomeController@index');
