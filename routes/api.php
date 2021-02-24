<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');
Route::post('forgot-password', 'API\UserController@forgot_password');
Route::post('reset-password', 'API\UserController@reset_password');
Route::get('user', 'API\UserController@get_authenticate_user')->middleware('auth:api');
Route::get('categories', 'API\CommonController@get_categories');
Route::get('subcategories', 'API\CommonController@get_subcategories');
Route::get('brands', 'API\CommonController@get_brands');
Route::get('hot-deals/products', 'API\CommonController@get_hotdeals_products');
Route::get('top/products', 'API\CommonController@get_top_products');
Route::get('recent/products', 'API\CommonController@get_recent_products');
Route::get('single-product/{id}', 'API\CommonController@get_single_product');
Route::get('add-wishlist/{id}', 'API\CommonController@add_wishlist')->middleware('auth:api');
Route::post('addCart/{id}', 'API\CommonController@add_to_cart')->middleware('auth:api'); //// in here if I don't set middleware('auth:api') then I will not get the authenticated user ///