<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', array('uses' => 'App\\Http\\Controllers\HomeController@dashboard'));
Route::post('/signin', array('uses' => 'App\\Http\\Controllers\HomeController@dologin'));
Route::get('/logout', array('uses' => 'App\\Http\\Controllers\HomeController@logout'));

Route::post('reset_password_without_token', 'App\\Http\\Controllers\HomeController@validatePasswordRequest');

Route::get('/password/reset/{key}/{email}', array('uses' => 'App\\Http\\Controllers\HomeController@index_reset'));
Route::post('reset_password_with_token', 'App\\Http\\Controllers\HomeController@resetPassword');

Route::get('/forgottenpassword', function () {
    return view('forgotten_password');
});
Route::post('/resetpass/',[  'as' => 'updates',
        'uses' =>'App\\Http\\Controllers\HomeController@reset']);

Route::get('/zakaznici', array('uses' => 'App\\Http\\Controllers\HomeController@customers'));

Route::get('/admins', 'App\\Http\\Controllers\HomeController@user_index');

Route::get('/menu', 'App\\Http\\Controllers\HomeController@showmenu');


Route::get('/addsuper/','App\\Http\\Controllers\HomeController@showaddAdmin');
Route::post('/addsuper/',[  'as' => 'updates',
        'uses' =>'App\\Http\\Controllers\HomeController@add_admin']);
Route::get('/delete/{id}', [
    'as' => 'delete', 'uses' => 'App\\Http\\Controllers\HomeController@delete'
]);


Route::get('/addcustomer', array('uses' => 'App\\Http\\Controllers\HomeController@showaddcustomer'));
Route::post('/customeradded', array('uses' => 'App\\Http\\Controllers\HomeController@addcustomer'));


Route::get('/edit/{id}','App\\Http\\Controllers\HomeController@edit');
Route::post('/edited/',[  'as' => 'updates',
        'uses' =>'App\\Http\\Controllers\HomeController@edit_validator']);

Route::get('/editcustomer/{id}','App\\Http\\Controllers\HomeController@editcustomer');
Route::post('/editedcustomer/',[  'as' => 'updates',
        'uses' =>'App\\Http\\Controllers\HomeController@editedcustomer']);
