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

Route::get('/test' , [
    'uses' => 'HomeController@getIndex',
    'as' => 'product.index'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/menu/home', 'HomeController@getMenuMenu')->name('menu_home');

Route::get('/categories', 'RestaurantController@categories')->name('categories');

Route::get('/category/{id}', 'RestaurantController@categoryDetails')->name('category.details');

Route::post('/updateCatgory/{id}', 'RestaurantController@categoryUpdate')->name('updateCategory');

Route::get('/deleteCategory/{id}', 'RestaurantController@getCategoryDelete')->name('getCategoryDelete');

Route::post('/addCategory', 'RestaurantController@addCategory')->name('addCategory');

Route::get('/getAddCategory', 'RestaurantController@getAddCategory')->name('getAddCategory');

Route::get('/products', 'RestaurantController@products')->name('products');

Route::get('/product/{id}', 'RestaurantController@productDetails')->name('product.details');

Route::post('/updateProduct/{id}', 'RestaurantController@productUpdate')->name('updateProduct');

Route::get('/getAddProduct', 'RestaurantController@getAddProduct')->name('getAddProduct');

Route::post('/addProduct', 'RestaurantController@addProduct')->name('addProduct');

Route::get('/deleteProduct/{id}', 'RestaurantController@getProductDelete')->name('getProductDelete');

Route::get('/waiters', 'RestaurantController@waiters')->name('waiters');

Route::get('/waiter/{id}', 'RestaurantController@waiterDetails')->name('waiter.details');

Route::post('/updateWaiter/{id}', 'RestaurantController@waiterUpdate')->name('updateWaiter');

Route::get('/deleteWaiter/{id}', 'RestaurantController@getWaiterDelete')->name('getWaiterDelete');

Route::get('/getAddWaiter', 'RestaurantController@getAddWaiter')->name('getAddWaiter');

Route::post('/addWaiter', 'RestaurantController@addWaiter')->name('addWaiter');

Route::get('/restaurant/management', 'RestaurantController@getRestaurantManagement')->name('restaurant');

Route::get('/restaurant/management/tables', 'RestaurantController@getManageTables')->name('getManageTables');

Route::get('/restaurant/management/table/{id}', 'RestaurantController@getEditTable')->name('getEditTable');

Route::post('/restaurant/management/table/update', 'RestaurantController@updateTable')->name('updateTable');

Route::post('/restaurant/management/table/add', 'RestaurantController@addTable')->name('addTable');

Route::get('/deleteTable/{id}', 'RestaurantController@getTableDelete')->name('getTableDelete');

Route::get('/restaurant/management/zones', 'RestaurantController@getManageZones')->name('getManageZones');

Route::get('/restaurant/management/zones/delete/{id}', 'RestaurantController@getZoneDelete')->name('getZoneDelete');

Route::post('/restaurant/management/zone/add', 'RestaurantController@addZone')->name('addZone');

Route::get('/restaurant/dashboard', 'RestaurantController@getDashboard')->name('getDashboard');