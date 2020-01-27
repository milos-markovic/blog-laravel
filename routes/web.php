<?php

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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/index','HomeController@adminIndex')->name('admin.index');
Route::get('user/index','HomeController@userIndex')->name('user.index');

// admin routes
Route::resource('admin/users','Admin\UserController')->names([
    'index' => 'admins.index',
    'create' => 'admins.create',
    'edit' => 'admins.edit',
    'store' => 'admins.store',
    'update' => 'admins.update',
    'destroy' => 'admins.destroy',
    'show' => 'admins.show',

]);

Route::resource('admin/categories','Admin\CategoryController')->names([
    'index' => 'admin.categories.index',
    'create' => 'admin.categories.create',
    'edit' => 'admin.categories.edit',
    'store' => 'admin.categories.store',
    'update' => 'admin.categories.update',
    'destroy' => 'admin.categories.destroy',
    'show' => 'admin.categories.show',
]);

Route::resource('admin/articles','Admin\ArticleController')->names([
    'index' => 'admin.articles.index',
    'create' => 'admin.articles.create',
    'edit' => 'admin.articles.edit',
    'store' => 'admin.articles.store',
    'update' => 'admin.articles.update',
    'destroy' => 'admin.articles.destroy',
    'show' => 'admin.articles.show',
]);
Route::get('admin/article/{article}/fullArticle','Admin\ArticleController@fullArticle')->name('admin.article.fullArticle');
Route::get('admin/article/serachArticle','Admin\ArticleController@searchArticle');
Route::get('admin/article/{article}/approve','Admin\ArticleController@approve')->name('admin.article.approve');

Route::resource('admin/comments','Admin\CommentController')->names([
    'index' => 'admin.comments.index',
    'create' => 'admin.comments.create',
    'edit' => 'admin.comments.edit',
    'store' => 'admin.comments.store',
    'update' => 'admin.comments.update',
    'destroy' => 'admin.comments.destroy',
    'show' => 'admin.comments.show',
]);
Route::get('admin/comment/{comment}/approve','Admin\CommentController@approve')->name('admin.comment.approve');


Route::resource('admin/comment/{comment}/reply','Admin\CommentReplyController');
Route::get('admin/reply/{reply}/approve','Admin\CommentReplyController@approve')->name('reply.approve');

// user routes
Route::resource('user/users','User\UserController')->only('index');

Route::resource('user/articles','User\ArticleController')->names([
    'index' => 'user.articles.index',
    'create' => 'user.articles.create',
    'edit' => 'user.articles.edit',
    'store' => 'user.articles.store',
    'update' => 'user.articles.update',
    'destroy' => 'user.articles.destroy',
    'show' => 'user.articles.show',
]);
Route::get('user/article/{article}/fullArticle','User\ArticleController@fullArticle')->name('user.article.fullArticle');

Route::resource('user/comments','User\CommentController')->names([
    'index' => 'user.comments.index',
    'create' => 'user.comments.create',
    'edit' => 'user.comments.edit',
    'store' => 'user.comments.store',
    'update' => 'user.comments.update',
    'destroy' => 'user.comments.destroy',
    'show' => 'user.comments.show',
]);
Route::get('user/comment/{comment}/approve','User\CommentController@approve')->name('user.comment.approve');



Route::resource('user/comment/{comment}/reply','User\CommentReplyController')->names([
    'index' => 'user.reply.index',
    'create' => 'user.reply.create',
    'edit' => 'user.reply.edit',
    'store' => 'user.reply.store',
    'update' => 'user.reply.update',
    'destroy' => 'user.reply.destroy',
    'show' => 'user.reply.show',
]);
Route::get('user/reply/{reply}/approve','Admin\CommentReplyController@approve')->name('user.reply.approve');





// public routes

Route::get('/','PublicController@index');
Route::get('articles','PublicController@allCategories')->name('public.categories');
Route::get('articles/searchArticle','PublicController@searchArticle');
Route::get('category/{category}/articles','PublicController@getArticlesByCategory')->name('public.categoryArticles');
Route::get('fullArticle/{article}','PublicController@getFullArticle')->name('public.fullArticle');