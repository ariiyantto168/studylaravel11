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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// users
Route::get('/users', 'UsersController@index')->name('profile');
Route::get('/users/create-new', 'UsersController@create_page')->name('create');

// Categories
Route::get('/categories', 'CategoriesController@index')->name('index');
Route::get('/categories/create-new', 'CategoriesController@create_page')->name('create_page');
Route::post('/categories/create-new', 'CategoriesController@save_page')->name('create_page');
Route::get('/categories/update/{categories}', 'CategoriesController@update_page')->name('edit');
Route::post('/categories/update/{categories}', 'CategoriesController@update_save')->name('update');
Route::delete('/categories/delete/{categories}', 'CategoriesController@delete')->name('delete');
Route::get('/categories/view/{categories}', 'CategoriesController@view_categories')->name('view');

// Items
Route::get('/items', 'ItemsController@index')->name('index');
Route::get('/items/create-new', 'ItemsController@create_page')->name('create');
Route::post('/items/create-new', 'ItemsController@save_page')->name('create'); 
Route::get('/items/update/{items}', 'ItemsController@update_page')->name('edit'); 
Route::post('/items/update/{items}', 'ItemsController@update_save')->name('update'); 
Route::delete('/items/delete/{items}', 'ItemsController@delete')->name('delete');

// Levels
Route::get('/levels', 'LevelsController@index')->name('index');
Route::get('/levels/create-new', 'LevelsController@create_page')->name('create');
Route::post('/levels/create-new', 'LevelsController@save_page')->name('create'); 
Route::get('/levels/update/{level}', 'LevelsController@update_page')->name('edit'); 
Route::post('/levels/update/{level}', 'LevelsController@update_save')->name('update'); 
Route::delete('/levels/delete/{level}', 'LevelsController@delete')->name('delete');

// funloc
Route::get('/funlocs', 'FunlocsController@index')->name('index');
Route::get('/funlocs/create-new', 'FunlocsController@create_page')->name('create');
Route::post('/funlocs/create-new', 'FunlocsController@save_page')->name('create');
Route::get('/funlocs/update/{funloc}', 'FunlocsController@update_page')->name('edit'); 
Route::post('/funlocs/update/{funloc}', 'FunlocsController@update_save')->name('update'); 
Route::delete('/funlocs/delete/{funloc}', 'FunlocsController@delete')->name('delete');


// orders
Route::get('/orders', 'OrdersController@index')->name('index');
Route::get('/orders/create-new', 'OrdersController@create_page')->name('create');
Route::post('/orders/create-new', 'OrdersController@save_page')->name('create');
Route::get('/orders/update/{order}', 'OrdersController@update_page')->name('edit');
Route::post('/orders/update/{order}', 'OrdersController@update_save')->name('update');
Route::get('/orders/view/{order}', 'OrdersController@view_orders')->name('view');