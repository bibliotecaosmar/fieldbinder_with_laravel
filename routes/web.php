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

/**
 * 
 * 
 *  *Routes that get the view*
 *
 */
 //homepage
Route::get('/', ['as' => 'home', 'uses' => 'Controller@home']);
//website documentation
Route::group(['prefix' => '/documentation'], function()
{
    Route::get('/guide', ['as' => 'documentation.guide', 'uses' => 'Controller@guide']);
    Route::get('/ourproposal', ['as' => 'documentation.ourproposal', 'uses' => 'Controller@ourproposal']);    
});
//user pages
Route::group(['prefix' => '/user'], function()
{
    Route::get('/profile', ['as' => 'user.profile', 'uses' => 'UserController@show']);
    Route::get('/login', ['as' => 'user.login', 'uses' => 'Controller@login']);
    Route::get('/register', ['as' => 'user.register', 'uses' => 'Controller@register']);
});
//catalog views
Route::group(['prefix' => '/catalog'], function()
{
    Route::get('/{niche}', ['as' => 'catalog.spiecie', 'uses' => 'CatalogController@catalog']);
    Route::get('/spiecie', ['as' => 'catalog.info', 'uses' => 'Controller@spiecieInfo']);
    Route::get('/lister', ['as' => 'catalog.lister', 'uses' => 'Controller@lister']);
});
/**
 * 
 * 
 *  *Routes that post methods*
 *
 */

Route::resource('user', 'UsersController');
Route::resource('spiecie', 'SpieciesController');
Route::resource('record', 'RecordsController');

Route::get('/account', ['as' => 'user.account', 'uses' => 'AccountController@index']);
Route::get('/catalog', ['as' => 'spiecie.lister', 'uses' => 'ListerController@index']);

Route::post('/login', ['as' => 'account.login', 'uses' => 'AccountController@auth']);
Route::post('/lister', ['as' => 'lister.submit', 'uses' => 'ListerController@submit']);

/*
Route::get('/', function () {
    return view('welcome');
});
*/