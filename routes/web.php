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
#homepage
Route::redirect('/', '/home');
Route::get('/home', ['as' => 'home', 'uses' => 'Controller@home']);
#user pages
Route::get('/profile', ['as' => 'user.profile', 'uses' => 'Controller@profile']);
Route::get('/login', ['as' => 'user.login', 'uses' => 'Controller@login']);
Route::get('/register', ['as' => 'user.register', 'uses' => 'Controller@register']);
#website documentation
Route::group(['prefix' => '/documentation'], function()
{
    Route::get('/guide', ['as' => 'documentation.guide', 'uses' => 'Controller@guide']);
    Route::get('/ourproposal', ['as' => 'documentation.ourproposal', 'uses' => 'Controller@ourproposal']);
});

/**
 *
 *  *Catalog Views*
 *
 */
Route::group(['prefix' => '/catalog'], function()
{
    Route::get('/{niche}/page/{page}', ['as' => 'catalog.spiecies', 'uses' => 'Controller@catalog']);
    Route::get('/info/{niche}', ['as' => 'catalog.info', 'uses' => 'Controller@spiecie']);
    Route::get('/lister/{niche}', ['as' => 'catalog.lister', 'uses' => 'Controller@lister']);
});

/**
 *
 *
 *  *Resources*
 *
 */
Route::resource('user', 'UsersController');
Route::resource('spiecie.niche', 'SpieciesController');
Route::resource('record', 'RecordsController');

/**
 *
 *
 *  *Redirects of method*
 *
 */
Route::get('/logged', ['as' => 'user.dashboard', 'uses' => 'DashboardController@index']);
Route::get('/{niche}&&{page?}', ['as' => 'spiecie.indexer', 'uses' => 'SpieciesController@indexer']);

/**
 *
 *  *Post routes*
 *
 */
Route::post('/authenticate', ['as' => 'dashboard.login', 'uses' => 'DashboardController@auth']);
Route::post('/vote', ['as' => 'survey.vote', 'uses' => 'SurveyController@vote']);
/*
Route::get('/', function () {
    return view('welcome');
});
*/
