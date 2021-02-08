<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ChatController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/chat', function () {
    return Inertia::render('Chat/container');
})->name('chat');

Route::middleware('auth:sanctum')->get('/chat/rooms',[ChatController::class,'rooms']);
Route::middleware('auth:sanctum')->get('/chat/room/{roomId}/messages',[ChatController::class,'messages']);
Route::middleware('auth:sanctum')->post('/chat/room/{roomId}/message',[ChatController::class,'newMessage']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/groups','App\Http\Controllers\GroupController@index')->name('groups.index');
Route::get('/groups/create','App\Http\Controllers\GroupController@create')->name('groups.create');
Route::post('/groups','App\Http\Controllers\GroupController@store')->name('groups.store');
Route::get('/groups/{id}','App\Http\Controllers\GroupController@show')->name('groups.show');
Route::get('/groups/{id}/edit','App\Http\Controllers\GroupController@edit')->name('groups.edit');
Route::patch('/groups/{id}','App\Http\Controllers\GroupController@update')->name('groups.update');
Route::delete('/groups/{id}','App\Http\Controllers\GroupController@destroy')->name('groups.destroy');

Route::get('/groups/{id}/join','App\Http\Controllers\GroupController@join')->name('groups.join');


#Blogs
Route::get('/groups/{group_id}/blogs/create','App\Http\Controllers\BlogController@create')->name('groups.blogs.create');
Route::post('/groups/{group_id}/blogs','App\Http\Controllers\BlogController@store')->name('groups.blogs.store');
Route::get('groups/{group_id}/blogs/{blog_id}','App\Http\Controllers\BlogController@show')->name('groups.blogs.show');
Route::get('/groups/{group_id}/blogs/{blog_id}/edit','App\Http\Controllers\BlogController@edit')->name('groups.blogs.edit');
Route::patch('/groups/{group_id}/blogs/{blog_id}','App\Http\Controllers\BlogController@update')->name('groups.blogs.update');
Route::delete('/groups/{group_id}/blogs/{blog_id}','App\Http\Controllers\BlogController@destroy')->name('groups.blogs.destroy');

#Posts
Route::get('/groups/{group_id}/blogs/{blog_id}/posts/{post_id}','App\Http\Controllers\PostController@show')->name('groups.blogs.posts.show');
Route::get('/groups/{group_id}/blogs/{blog_id}/posts/create','App\Http\Controllers\PostController@create')->name('groups.blogs.posts.create');
Route::post('/groups/{group_id}/blogs/{blog_id}/posts','App\Http\Controllers\PostController@store')->name('groups.blogs.posts.store');
Route::get('/groups/{group_id}/blogs/{blog_id}/posts/{post_id}/edit','App\Http\Controllers\PostController@edit')->name('groups.blogs.posts.edit');
Route::patch('/groups/{group_id}/blogs/{blog_id}/posts/{post_id}','App\Http\Controllers\PostController@update')->name('groups.blogs.posts.update');
Route::delete('/groups/{group_id}/blogs/{blog_id}/posts/{post_id}','App\Http\Controllers\PostController@destroy')->name('groups.blogs.posts.destroy');


#Comments
Route::post('/groups/{group_id}/blogs/{blog_id}/posts/{post_id}/comments','App\Http\Controllers\CommentController@store')->name('groups.blogs.posts.comments.store');
Route::delete('/groups/{group_id}/blogs/{blog_id}/posts/{post_id}/comments/{comment_id}','App\Http\Controllers\CommentController@destroy')->name('groups.blogs.posts.comments.destroy');
