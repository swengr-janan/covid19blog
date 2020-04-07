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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

Auth::routes();

Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('/report', 'GetApiController@index');

//Comment creation
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);

//Comment display
Route::get('/comments/{post_id}', 'CommentsController@show')->name('posts.comment_list');

//Post deletion
Route::delete('posts/{id}', ['uses' => 'PostsController@destroy', 'as' => 'posts.destroy']);
Route::get('posts/{id}/delete', ['uses' => 'PostsController@delete', 'as' => 'posts.delete']);

//Comment deletion
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);
