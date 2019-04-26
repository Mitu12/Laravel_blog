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
Route::get('/', 'WelcomeController@index');
Route::get('/contact', 'WelcomeController@contact');
Route::get('/gallery', 'WelcomeController@gallery');
Route::get('/categories', 'WelcomeController@categories');
Route::get('/archives', 'WelcomeController@archives');
Route::get('/about', 'WelcomeController@about');
Route::get('/blog-details/{id}', 'WelcomeController@blogDetails');
Route::get('/category-blog/{id}', 'WelcomeController@categoryBlog');


Auth::routes();

// Route::get('/home', 'HomeController@index');
Route::get('/admin', 'AdminController@index');
Route::post('/admin-login', 'AdminController@adminLogin');
Route::get('/dashboard', 'SuperAdminController@index');

//category
Route::get('/add-category', 'SuperAdminController@addCategory');
Route::post('/save-category', 'SuperAdminController@saveCategory');
Route::get('/manage-category', 'SuperAdminController@manageCategory');
Route::get('/unpublished-category/{id}', 'SuperAdminController@unpublishedCategory');
Route::get('/published-category/{id}', 'SuperAdminController@publishedCategory');
Route::get('/delete-category/{id}', 'SuperAdminController@deleteCategory');
Route::get('/edit-category/{id}', 'SuperAdminController@editCategory');
Route::post('/update-category', 'SuperAdminController@updateCategory');

//blog
Route::get('/add-blog', 'SuperAdminController@addBlog');
Route::post('/save-blog', 'SuperAdminController@saveBlog');
Route::get('/manage-blog', 'SuperAdminController@manageBlog');
Route::get('/unpublished-blog/{id}', 'SuperAdminController@unpublishedBlog');
Route::get('/published-blog/{id}', 'SuperAdminController@publishedBlog');
Route::get('/delete-blog/{id}', 'SuperAdminController@deleteBlog');
Route::get('/edit-blog/{id}', 'SuperAdminController@editBlog');
Route::post('/update-blog', 'SuperAdminController@updateBlog');



Route::get('/logout', 'SuperAdminController@logout');
