<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->post('/weekmenu', 'Api\WeekmenuApiController@store');
//Route::middleware('auth:api')->get('/weekmenu', function () { return 'hello world'; });

Route::middleware('auth:api')->get('/meals', 'Api\MealsApiController@index');
Route::middleware('auth:api')->get('/meals/{id}', 'Api\MealsApiController@view');

Route::middleware('auth:api')->get('/tools/random/{amount?}/{filter?}/{filterid?}', 'Api\ToolsApiController@random');

Route::middleware('auth:api')->get('/mealcategories', 'Api\MealCategoriesApiController@index');

Route::middleware('auth:api')->get('/ingredients', 'Api\IngredientsApiController@index');
Route::middleware('auth:api')->post('/ingredients', 'Api\IngredientsApiController@store');
Route::middleware('auth:api')->delete('/ingredients/{id}', 'Api\IngredientsApiController@delete');
Route::middleware('auth:api')->patch('/ingredients/{id}', 'Api\IngredientsApiController@patch');





//Route::get('articles/{id}', 'ArticleController@show');
//Route::post('articles', 'ArticleController@store');
//Route::put('articles/{id}', 'ArticleController@update');
//Route::delete('articles/{id}', 'ArticleController@delete');
