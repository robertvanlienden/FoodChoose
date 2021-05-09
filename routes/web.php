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
    if(!auth()->guest()){
        return redirect('/home');
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/new-user', function() { return view('new-user'); });
Route::get('/changelog', 'PageController@changelog')->name('changelog');
Route::get('/terms-and-conditions', 'PageController@termsAndConditions')->name('terms-and-conditions');

Route::get('/profile/{username}', 'ProfileController@view')->name('view-profile');
Route::get('/profile/{id}/edit', 'ProfileController@edit')->name('edit-profile');
//todo: update to patch
Route::post('/profile/{id}/edit', 'ProfileController@update');

Route::get('/randommeal', 'ToolsController@randommeal')->name('randommeal');
Route::get('/weekplanner', 'ToolsController@weekPlanner')->name('weekplanner');

Route::get('/saved-weekmenu', 'WeekmenuController@index')->name('saved-weekmenu');
Route::get('/saved-weekmenu/view/{weekmenu}', 'WeekmenuController@view')->name('weekmenu');
Route::delete('/saved-weekmenu/{weekmenu}', 'WeekmenuController@delete');


Route::post('/ingredients/add', 'IngredientsController@store');
Route::get('/ingredients', 'IngredientsController@index')->name('ingredients');
Route::get('/ingredients/add', 'IngredientsController@add')->name('add-ingredient');
Route::get('/ingredients/{id}', 'IngredientsController@edit');
Route::patch('/ingredients/{id}', 'IngredientsController@patch');
Route::delete('/ingredients/{id}', 'IngredientsController@delete');

Route::post('/meals/add', 'MealsController@store');
Route::get('/meals', 'MealsController@index')->name('meals');
Route::get('/meals/add', 'MealsController@add')->name('add-meal');
Route::get('/meals/{id}', 'MealsController@edit');
Route::get('/meals/view/{id}', 'MealsController@view');
Route::patch('/meals/{id}', 'MealsController@patch');
Route::delete('/meals/{id}', 'MealsController@delete');

Route::post('/mealcategories/create', 'MealCategoriesController@store');
Route::get('/mealcategories', 'MealCategoriesController@index')->name('mealcategories');
Route::get('/mealcategories/create', 'MealCategoriesController@create')->name('create-mealcategories');
Route::get('/mealcategories/{mealCategory}', 'MealCategoriesController@edit');
Route::patch('/mealcategories/{mealCategory}', 'MealCategoriesController@update');
Route::delete('/mealcategories/{mealCategory}', 'MealCategoriesController@destroy');
