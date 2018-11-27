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
    Route::get('/login', ['as' => 'user.login', 'uses' => 'Controller@login']);
    Route::get('/register', ['as' => 'user.register', 'uses' => 'Controller@register']);
    Route::get('/profile', ['as' => 'user.profile', 'uses' => 'Controller@profile']);
});
//catalog views
Route::group(['prefix' => '/catalog'], function()
{
    Route::get('/plant', ['as' => 'catalog.plant', 'uses' => 'Controller@plant']);
    Route::get('/animal', ['as' => 'catalog.animal', 'uses' => 'Controller@animal']);
    Route::get('/insect', ['as' => 'catalog.insect', 'uses' => 'Controller@insect']);
    Route::get('/mushroom', ['as' => 'catalog.mushroom', 'uses' => 'Controller@mushroom']);
    Route::get('/spiecieInfo', ['as' => 'catalog.spiecieInfo', 'uses' => 'Controller@spiecieInfo']);
});

/**
 * 
 * 
 *  *Routes that post methods*
 *
 */

Route::resource('user', 'UsersController');
Route::post('/login', ['as' => 'dashboard.login', 'uses' => 'DashboardController@auth']);
Route::post('/dashboard', ['as' => 'user.dashboard', 'uses' => 'DashboardController@index']);


/*
Route::get('/', function () {
    return view('welcome');
});
*/